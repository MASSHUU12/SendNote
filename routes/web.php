<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\QuickRemovalController;

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

// Route for locale change
Route::get('language/{locale}', [LocalizationController::class, 'main']);


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

// Quick deletion
Route::match(['get', 'delete'], '/delete', [QuickRemovalController::class, 'checkIfRemovalAttempt']);

// Displaying note
Route::match(['get', 'post'], '/n/{string}', [NoteController::class, 'handleLink'])->middleware('verify.link');

// Privacy Policy
Route::get('/privacy', function () {
    return view('privacy');
});

// Cookie Policy
Route::get('/cookie', function () {
    return view('cookie');
});
