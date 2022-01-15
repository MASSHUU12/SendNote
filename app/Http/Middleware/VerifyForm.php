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
        $err_container = ['title' => __('There was an problem, info below:')];

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

        // title
        if ($title == null) array_push($err_container, ['missing_t' => __('Title is missing')]);
        elseif (strlen($title) > 255) array_push($err_container, ['len_t' => __('Title exceeds 255 characters limit')]);

        // note content
        if ($note_content == null) array_push($err_container, ['missing_n' => __('Note is missing')]);
        elseif (strlen($note_content) > 4096) array_push($err_container, ['len_c' => __('Content exceeds 4096 characters limit')]);

        // date
        $date_now = strtotime(date("Y-m-d"));
        $date_exp = strtotime($expiration_date);
        $date_30 = strtotime('+30 day');

        if ($expiration_date == null) array_push($err_container, ['missing_ed' => __('Expiration date is missing')]);
        elseif ($date_exp < $date_now || $date_exp > $date_30)
            array_push($err_container, ['date_err' => __('Note expiration date cannot be a past or future date greater than 30 days')]);

        /* logic for optional */

        // password
        if ($with_password != null && $password == null) array_push($err_container, ['missing_p' => __('Password is missing')]);
        else if ($with_password != null && $password == null && $password_conf == null) array_push($err_container, ['missing_r' => __('Repeat password')]);
        if ($with_password != null && $password != $password_conf) array_push($err_container, ['does_not_match' => __('Passwords does not match')]);

        // notification
        if ($with_notification != null && $email == null) array_push($err_container, ['missing_e' => __('Email is missing')]);
        else if ($with_notification != null && !filter_var($email, FILTER_VALIDATE_EMAIL)) array_push($err_container, ['invalid_e' => __('Invalid email format')]);

        // views
        if ($with_views != null && $views == null) array_push($err_container, ['missing_nv' => __('The number of views is missing')]);
        else if ($with_views != null && $views <= 0 || $views > 100) array_push($err_container, ['small_nv' => __('The number of views must not be less than 1 and higher than 100')]);

        if (sizeof($err_container) >= 2) return back()->withErrors($err_container)->withInput();
        else return $next($request);
    }
}
