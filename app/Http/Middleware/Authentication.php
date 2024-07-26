<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
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
        $token = session('login_uts_token');
        $who_is_login = session('login_is');
        $adminToken = DB::table('personal_access_tokens')->where('token', $token)->first();
        $is_expired = Carbon::now()->greaterThan($adminToken->expiration);

        if (!session('login_is') || !$adminToken || $is_expired) {
            if ($adminToken && $is_expired) {
                DB::table('personal_access_tokens')->where('token', $token)->delete();
                session()->forget(['login_is', 'login_uts_token']);
            }

            return to_route('admin.login.view');
        }

        // Get the current route name
        $routeName = Route::currentRouteName();

        // Check access based on user type
        if ($who_is_login === 'admin' && str_starts_with($routeName, 'admin.')) {
            return $next($request);
        } elseif ($who_is_login === 'monitor') {
            return to_route('monitor.index');
        }

        if ($who_is_login === 'monitor' && str_starts_with($routeName, 'monitor.')) {
            return $next($request);
        } elseif ($who_is_login === 'admin') {
            return to_route('admin.dashboard');
        }

        return to_route('kehadiran.index');
    }
}
