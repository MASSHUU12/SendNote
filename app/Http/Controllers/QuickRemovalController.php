<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuickRemovalController extends Controller
{
    function checkIfRemovalAttempt(Request $request)
    {
        $s = $request->input('submit');
        $link = explode("/", $request->input('deletion_link'));

        if ($s == 'DELETE') {
            $d = DB::delete('delete from notes where link = ?', [$link[2]]);

            if ($d == 1) return redirect('/result')->with('status', 'deleted_successfully');
        } else abort(404);
    }
}
