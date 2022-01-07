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
        $link = md5($title);

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

        // encrypt note
        $iv_length = openssl_cipher_iv_length('aes128');
        $iv = openssl_random_pseudo_bytes($iv_length);
        $encrypted_note_content = openssl_encrypt($note_content, 'aes128', $link, 0, $iv);

        // send to database
        DB::insert('insert into notes (title, expiration_date, content, link, password, notification_email, notification_reference, views_limit, views_count) values (?, ?, ?, ?, ?, ?, ?, ?, ?)', [$title, $expiration_date, bin2hex($iv) . $encrypted_note_content, $link, $password, $email, $email_ref, $views, 0]);

        return redirect('/result')->with('status', 'successful')->with('link', $_SERVER['HTTP_HOST'] . '/n' . '/' . $link);
    }
}
