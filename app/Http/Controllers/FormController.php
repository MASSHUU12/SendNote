<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class FormController extends Controller
{
    function handleForm(Request $request)
    {
        /* main */
        $title = $request->input('title');
        $expiration_date = $request->input('expiration_date');
        $note_content = $request->input('note_content');
        $link = $this->encryptStr($title, $title, true);

        /* optional */

        // password
        $with_password = $request->input('with_password');

        if ($with_password == null) $password = "null";
        else $password = md5($request->input('password'));

        // notification
        $with_notification = $request->input('with_notification');

        if ($with_notification == null) {
            $email = "null";
            $email_ref = "null";
        } else {
            $email = $request->input('email');
            $email_ref = $request->input('email_ref');
        }

        // views
        $with_views = $request->input('with_views');

        if ($with_views == null) $views = 0;
        else $views = $request->input('views');

        $encrypted_note_content = $this->encryptStr($note_content, $link, false);

        // send to database
        Note::create([
            'title' => $title,
            'expiration_date' => $expiration_date,
            'content' => $encrypted_note_content,
            'link' => $link,
            'password' => $password,
            'notification_email' => $email,
            'notification_reference' => $email_ref,
            'views_limit' => $views,
            'views_count' => 0
        ]);
        return redirect('/result')->with(['status' => 'successful', 'link' => $_SERVER['HTTP_HOST'] . '/n' . '/' . $link]);
    }

    /*
    |* To solve the problem of encrypting long strings,
    |* I found that the best option would be to split the entire string into smaller 15 character strings.
    |* Encrypting a string of 15 characters does not cause problems.
    |* After encryption, all strings are concatenated into one separated by a ";" to make decryption easier later
    */
    function encryptStr($str, $key, $isLink)
    {
        $e = chunk_split($str, 15, "/");
        $s = explode("/", $e);

        $iv_length = openssl_cipher_iv_length('aes256');
        $iv = openssl_random_pseudo_bytes($iv_length);

        $encrypted = [bin2hex($iv)];

        foreach ($s as $v) {
            /*
            |* When a title is encrypted for use as a link, even if it is long,
            |* it is not split into parts because it will not be decrypted later.
            |* Encryption is only used to generate as random a string as possible that can be used as a link
            */
            if ($isLink) return md5(openssl_encrypt($str, 'aes256', $key, 0, $iv));
            else array_push($encrypted, openssl_encrypt($v, 'aes256', $key, 0, $iv));
        }
        return implode(";", $encrypted);
    }
}
