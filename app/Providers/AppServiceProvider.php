<?php

namespace App\Providers;

use App\Repositories\Contracts\InventoryRepositoryInterface;
use App\Repositories\JsonInventoryRepository;
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
        $this->app->bind(InventoryRepositoryInterface::class, JsonInventoryRepository::class);
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
