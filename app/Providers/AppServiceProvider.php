<?php

namespace App\Providers;

use App\Contracts\ParcerContract;
use App\Services\ParcerService;
use App\Contracts\SocialContract;
use App\Services\SocialService;
use App\Services\UploadedService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ParcerContract::class, ParcerService::class);
        $this->app->bind(SocialContract::class, SocialService::class);
        
        $this->app->bind(UploadedService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
