<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class NoteController extends Controller
{
    function handleLink(Request $request)
    {
        $link = $request->string;
        $result = Note::where('link', $link)->first();
        $decrypted_note = $this->decryptNote($result->content, $link);

        // If the note is not password-protected, the page immediately displays its contents
        if ($result->password == 'null') {
            $this->updateViewCount($result);
            return view('n')->with(['status' => 'good', 'title' => $result->title, 'content' => $decrypted_note]);
        } else if ($request->input('note_password') != null)
            /*
            |* If the note is password protected and the user has entered the correct password,
            |* the page will display the contents of the note,
            |* otherwise it will display an error and ask for the password again
            */
            if (md5($request->input('note_password')) == $result->password) {
                $this->updateViewCount($result);
                return view('n')->with(['status' => 'good', 'title' => $result->title, 'content' => $decrypted_note]);
            } else return view('n')->with(['status' => 'wrong_password', 'link' => $link]);
        else return view('n')->with(['status' => 'secured', 'link' => $link]); // If the note is password protected the user will be prompted to enter the password
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

    function updateViewCount($result)
    {
        $views = $result->views_count;

        /*
        |* If the number of times a note has been viewed has reached the limit,
        |* the note will be deleted from the database,
        |* otherwise the number of times it has been viewed will be updated
        */
        if ($views + 1 >= $result->views_limit) Note::find($result->id)->delete();
        else Note::find($result->id)->update(['views_count' => $views + 1]);
    }

    // function sendNotification($db_result)
    // {
    //     if ($db_result->notification_email != 'null')
    //         echo 'aaaaaaaaaaaaaaaaa';
    // }
}
