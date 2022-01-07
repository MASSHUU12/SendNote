<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerifyLink
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
        $link = $request->string;

        if (strlen($link) < 32 || strlen($link) > 32) return abort(404);
        else {
            $result = DB::select('select id from notes where link = ?', [$link]);

            if (sizeof($result) <= 0) abort(404);
            else return $next($request);
        }
    }
}
