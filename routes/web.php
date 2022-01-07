<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\NoteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home
Route::get('/', function () {
    return view('home');
});

// Handling form input
Route::post('/create', [FormController::class, 'handleForm'])->middleware('verify.form');

// Displaying result
Route::get('/result', function () {
    return view('result');
});

// Displaying note
Route::match(['get', 'post'], '/n/{string}', [NoteController::class, 'handleLink'])->middleware('verify.link');

// Privacy Policy
Route::get('/privacy', function () {
    return view('privacy');
});
