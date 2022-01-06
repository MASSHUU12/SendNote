<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $password = $request->input('password');

        // notification
        $with_notification = $request->input('with_notification');
        $email = $request->input('email');
        $email_ref = $request->input('email_ref');

        // views
        $with_views = $request->input('with_views');
        $views = $request->input('views');

        // encrypt note
        $iv_length = openssl_cipher_iv_length('aes128');
        $iv = openssl_random_pseudo_bytes($iv_length);
        $encrypted_note_content = openssl_encrypt($note_content, 'aes128', $link, 0, $iv);

        echo 'Original message: ' . $note_content . '<br />';
        echo 'Encrypted message: ' . $encrypted_note_content . '<br />';
        echo 'Decrypted message: ' . openssl_decrypt($encrypted_note_content, 'aes128', $link, 0, $iv);
    }
}
