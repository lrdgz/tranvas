<?php

namespace App\Providers;

use App\Modules\Event\Repositories\EloquentEvents;
use App\Modules\Event\Repositories\EventRepository;
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
        $this->app->bind(EventRepository::class, EloquentEvents::class);
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
