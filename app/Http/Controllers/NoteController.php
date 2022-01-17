<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoteController extends Controller
{
    function handleLink(Request $request)
    {
        $link = $request->string;
        $result = DB::select('select * from notes where link = ?', [$link]);
        $decrypted_note = $this->decryptNote($result[0]->content, $link);

        if ($result[0]->password == 'null' || $request->input('note_password') != null) {
            $views = $result[0]->views_count;

            $this->sendNotification($result); //!

            /*
            |* If the number of times a note has been viewed has reached the limit,
            |* the note will be deleted from the database,
            |* otherwise the number of times it has been viewed will be updated
            */
            if ($views + 1 >= $result[0]->views_limit) DB::delete('delete from notes where id = ?', [$result[0]->id]);
            else DB::update('update notes set views_count = ? where id = ?', [$views + 1, $result[0]->id]);
        }

        if ($result[0]->password == 'null') // If the note is not password-protected, the page immediately displays its contents
            return view('n')->with('status', 'good')->with('title', $result[0]->title)->with('content', $decrypted_note);
        else if ($request->input('note_password') != null)
            /*
            |* If the note is password protected and the user has entered the correct password,
            |* the page will display the contents of the note,
            |* otherwise it will display an error and ask for the password again
            */
            if (md5($request->input('note_password')) == $result[0]->password) return view('n')->with('status', 'good')->with('title', $result[0]->title)->with('content', $decrypted_note);
            else return view('n')->with('status', 'wrong_password')->with('link', $link);
        else return view('n')->with('status', 'secured')->with('link', $link); // If the note is password protected the user will be prompted to enter the password
    }

    // A function that decrypts a message divided into parts
    function decryptNote($content, $key)
    {
        $arr = explode(";", $content);
        $iv = hex2bin($arr[0]);
        $encrypted = [];

        array_shift($arr);

        foreach ($arr as $s) {
            array_push($encrypted, openssl_decrypt($s, 'aes256', $key, 0, $iv));
        }
        return implode($encrypted);
    }

    function sendNotification($db_result)
    {
        if ($db_result[0]->notification_email != 'null')
            echo 'aaaaaaaaaaaaaaaaa';
    }
}
