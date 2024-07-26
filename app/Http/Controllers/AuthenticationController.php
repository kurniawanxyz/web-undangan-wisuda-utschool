<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use Carbon\Carbon;
use DB;
use Str;

class AuthenticationController extends Controller
{
    public function __invoke()
    {
        return view("login");
    }

    public function login(AuthenticationRequest $request)
    {
        $email = $request->email;
        $password = $request->password;

        if (
            ($email === config('app.admin_email') && $password === config('app.admin_password')) ||
            ($email === config('app.monitor_email') && $password === config('app.monitor_password'))
        ) {
            $token = Str::random(60);
            $exp = Carbon::now()->addDay();
            if ($request->remember_me) {
                $exp = Carbon::now()->addDays(7);
            }

            DB::table('personal_access_tokens')->updateOrInsert(
                ['token' => $token],
                ['expiration' => $exp]
            );

            if ($email === config('app.monitor_email')) {
                session(['login_is' => 'monitor', 'login_uts_token' => $token]);
                return to_route('monitor.index');
            }

            session(['login_is' => 'admin', 'login_uts_token' => $token]);
            return to_route('admin.dashboard');
        }

        flash()->error('Email or password is incorrect');
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        try {
            $token = session('login_uts_token');
            if(!$token) return to_route('kehadiran.index');
            DB::table('personal_access_tokens')->where(['token' => $token])->delete();
            session()->forget('login_uts_token');
            session()->forget('login_is');

            return to_route('kehadiran.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
            return back();
        }
    }
}
