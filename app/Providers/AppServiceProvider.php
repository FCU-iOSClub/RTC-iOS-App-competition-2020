<?php

namespace App\Providers;

use App\Observers\TeamMemberObserver;
use App\TeamMember;
use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        URL::forceSchema('https');
        TeamMember::observe(TeamMemberObserver::class);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
