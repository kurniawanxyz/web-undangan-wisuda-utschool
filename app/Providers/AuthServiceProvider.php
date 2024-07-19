<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Auth::viaRequest('admin', function ($request) {
            if (session('admin_logged_in') && session('admin_token') === config('app.admin_token')) {
                return (object) [
                    'id' => 1,
                    'email' => config('app.admin_email'),
                    'name' => 'Admin',
                ];
            }
        });
    }
}
