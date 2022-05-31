<?php

namespace App\Providers;
use \Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
@production
    <link rel="stylesheet" href="{{ secure_asset('css/AdminLTE.min.css') }}">
@endproduction
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
    public function boot(){
  if ($this->app->environment('production')) {
    URL::forceScheme('https');
}
        if (env('APP_ENV') != 'local') {
            URL::forceScheme('https');
        } 
}
