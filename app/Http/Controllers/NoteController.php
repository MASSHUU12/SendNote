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

        // decrypt message
        $s = str_split($result[0]->content, 32);
        $decrypted_note = openssl_decrypt($s[1], 'aes128', $link, 0, hex2bin($s[0]));

        if ($result[0]->password == 'null' || $request->input('note_password') != null) {
            $views = $result[0]->views_count;

            $this->sendNotification($request);

            if ($views + 1 >= $result[0]->views_limit) DB::delete('delete from notes where id = ?', [$result[0]->id]);
            else DB::update('update notes set views_count = ? where id = ?', [$views + 1, $result[0]->id]);
        }

        if ($result[0]->password == 'null')
            return view('n')->with('status', 'good')->with('title', $result[0]->title)->with('content', $decrypted_note);
        else if ($request->input('note_password') != null)
            if (md5($request->input('note_password')) == $result[0]->password) return view('n')->with('status', 'good')->with('title', $result[0]->title)->with('content', $decrypted_note);
            else return view('n')->with('status', 'wrong_password')->with('link', $link);
        else return view('n')->with('status', 'secured')->with('link', $link);
    }

    function sendNotification($db_result)
    {
        if ($db_result[0]->notification_email != 'null')
            echo 'aaaaaaaaaaaaaaaaa';
    }
}
