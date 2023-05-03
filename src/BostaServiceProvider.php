<?php

namespace BiztechEG\laravelBostaIntegration;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BostaServiceProvider extends ServiceProvider
{

    /**
     * Register any application Notification services.
     *
     * @return void
     */

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/bosta.php', 'bosta'
        );
    }

    /**
     * Bootstrap any application Notification services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerRoutes();
        $this->loadViewsFrom(__DIR__ . '/../views', 'bosta');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
    }

     /**
     * register routes
     *
     * @return Route
     */
    protected function registerRoutes()
    {
        Route::group($this->adminRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__. '/../routes/admin.php');
        });

        Route::group($this->apiRouteConfiguration(), function () {
            $this->loadRoutesFrom(__DIR__. '/../routes/api.php');
        });
    }

    /**
     * get route configration settings
     *
     * @return array
     */
    protected function adminRouteConfiguration()
    {
        return [
            'prefix' => config('abnayiynotifications.admin_prefix'),
            'middleware' => config('abnayiynotifications.admin_middleware'),
        ];
    }

        /**
     * get route configration settings
     *
     * @return array
     */
    protected function apiRouteConfiguration()
    {
        return [
            'prefix' => config('bosta.api_prefix'),
            // 'middleware' => config('bosta.api_middleware'),
        ];
    }
}
