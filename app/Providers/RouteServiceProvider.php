<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{  /**
    * This namespace is applied to your controller routes.
    *
    * In addition, it is set as the URL generator's root namespace.
    *
    * @var string
    */
   //protected $namespace = 'App\Http\Controllers';
public const HOME='/';
   /**
    * Define your route model bindings, pattern filters, etc.
    *
    * @return void
    */
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
        //
    }
}
