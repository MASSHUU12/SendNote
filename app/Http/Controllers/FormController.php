<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        DB::insert('insert into notes (title, expiration_date, content, link, password, notification_email, notification_reference, views_limit, views_count) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $expiration_date, $encrypted_note_content, $link, $password, $email, $email_ref, $views, 0]);

        return redirect('/result')->with('status', 'successful')->with('link', $_SERVER['HTTP_HOST'] . '/n' . '/' . $link);
    }

    function encryptStr($str, $key, $isLink)
    {
        $e = chunk_split($str, 15, "/");
        $s = explode("/", $e);

        $iv_length = openssl_cipher_iv_length('aes256');
        $iv = openssl_random_pseudo_bytes($iv_length);

        $encrypted = [bin2hex($iv)];

        foreach ($s as $v) {
            if ($isLink) return md5(openssl_encrypt($str, 'aes256', $key, 0, $iv));
            else array_push($encrypted, openssl_encrypt($v, 'aes256', $key, 0, $iv));
        }
        return implode(";", $encrypted);
    }
}
