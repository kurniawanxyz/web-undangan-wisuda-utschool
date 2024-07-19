<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Authentication
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

            return to_route('admin.login.view');
        }

        return $next($request);
    }
}
