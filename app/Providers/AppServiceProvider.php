<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Blade::if('doctor', function () {
            return (Auth::user()->role == User::UserRole['Doctor']);
        });
        Blade::if('patient', function () {
            return (Auth::user()->role == User::UserRole['Patient']);
        });
        Blade::if('hospital_admin', function () {
            return (Auth::user()->role == User::UserRole['HospitalAdmin']);
        });
    }
}
