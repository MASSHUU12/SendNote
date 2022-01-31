<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;

class QuickRemovalController extends Controller
{
    function checkIfRemovalAttempt(Request $request)
    {
        $s = $request->input('submit');
        $link = explode("/", $request->input('deletion_link'));

        if ($s == 'DELETE' || $s == 'USUŃ') {
            $d = Note::where('link', $link[2])->delete();

            if ($d == 1) return redirect('/result')->with('status', 'deleted_successfully');
        } else abort(404);
    }
}
