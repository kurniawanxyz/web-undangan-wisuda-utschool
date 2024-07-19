<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use DB;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = session('admin_token');

        $adminToken = DB::table('personal_access_tokens')->where('token', $token)->first();

        if (!session('admin_logged_in') || !$adminToken || Carbon::now()->greaterThan($adminToken->expiration)) {
            if ($adminToken) {
                DB::table('personal_access_tokens')->where('token', $token)->delete();
            }

            session()->forget(['admin_logged_in', 'admin_token']);
            return $next($request);
        }

        return back();
    }
}
