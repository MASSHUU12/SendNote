<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $err_container = ['title' => 'There was an problem, info below:'];

        /* main */
        $title = $request->input('title');
        $expiration_date = $request->input('expiration_date');
        $note_content = $request->input('note_content');

        /* optional */

        // password
        $with_password = $request->input('with_password');
        $password = $request->input('password');
        $password_conf = $request->input('password_conf');

        // notification
        $with_notification = $request->input('with_notification');
        $email = $request->input('email');

        // views
        $with_views = $request->input('with_views');
        $views = $request->input('views');

        /* logic for main */
        if ($title == null) array_push($err_container, ['missing_t' => 'Title is missing']);
        if ($expiration_date == null) array_push($err_container, ['missing_ed' => 'Expiration date is missing']);
        if ($note_content == null) array_push($err_container, ['missing_n' => 'Note is missing']);

        /* logic for optional */

        // password
        if ($with_password != null && $password == null) array_push($err_container, ['missing_p' => 'Password is missing']);
        if ($with_password != null && $password_conf == null) array_push($err_container, ['missing_r' => 'Repeat password']);
        if ($with_password != null && $password != $password_conf) array_push($err_container, ['does_not_match' => 'Passwords does not match']);

        // notification
        if ($with_notification != null && $email == null) array_push($err_container, ['missing_e' => 'Email is missing']);
        else if ($with_notification != null && !filter_var($email, FILTER_VALIDATE_EMAIL)) array_push($err_container, ['invalid_e' => 'Invalid email format']);

        // views
        if ($with_views != null && $views == null) array_push($err_container, ['missing_nv' => 'The number of views is missing']);
        else if ($with_views != null && $views <= 0) array_push($err_container, ['small_nv' => 'The number of views must not be less than 1']);

        if (sizeof($err_container) >= 2) return back()->withErrors($err_container)->withInput();
        else return $next($request);
    }
}
