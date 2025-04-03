<?php

namespace App\Providers;

use App\repositories\TodosRepository;
use App\repositories\TodosRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class TodosServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(TodosRepositoryInterface::class,TodosRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
