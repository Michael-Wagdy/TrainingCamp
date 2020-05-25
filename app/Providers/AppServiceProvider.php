<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Observers\MailObserver;
use Illuminate\Support\Facades\Schema;

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
        Schema::defaultStringLength(191);

        // Make Sure that the Mailobserver that i created is connected with User Model
        User::observe(MailObserver::class);
    }
}
