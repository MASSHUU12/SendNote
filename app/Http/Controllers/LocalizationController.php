<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;

class LocalizationController extends Controller
{
    function main($locale)
    {
        app()->setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
