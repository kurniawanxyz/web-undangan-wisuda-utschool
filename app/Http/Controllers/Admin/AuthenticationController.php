<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticationRequest;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
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

        if ($email === config('app.admin_email') && $password === config('app.admin_password')) {
            $token = Str::random(60);
            $exp = Carbon::now()->addDay();
            if ($request->remember_me) {
                $exp = Carbon::now()->addDays(7);
            }

            session(['admin_logged_in' => true, 'admin_token' => $token]);
            DB::table('personal_access_tokens')->updateOrInsert(
                ['token' => $token],
                ['expiration' => $exp]
            );

            return to_route('admin.dashboard');
        }

        flash()->error('Email or password is incorrect');
        return redirect()->back()->withInput();
    }

    public function logout()
    {
        try{
            $token = session('admin_token');
            DB::table('personal_access_tokens')->where(['token' => $token])->delete();
            session()->forget('admin_token');
            session()->forget('admin_logged_in');

            return to_route('kehadiran.index');
        }catch(\Exception $e){
            flash()->error($e->getMessage());
            return back();
        }
    }
}
