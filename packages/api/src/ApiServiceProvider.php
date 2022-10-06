<?php

namespace Lunar\Api;

use Illuminate\Support\ServiceProvider;
use Lunar\Api\Globals\GlobalChannel;
use Lunar\Api\Globals\GlobalLanguage;

class ApiServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('storefront', function () {
            return new Storefront();
        });

        $this->app->scoped(GlobalChannel::class, function ($app) {
            return new GlobalChannel;
        });

        $this->app->scoped(GlobalLanguage::class, function ($app) {
            return new GlobalLanguage;
        });
    }

    /**
     * Boot up the service provider.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
