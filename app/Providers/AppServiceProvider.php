<?php

namespace App\Providers;

use App\Http\Domain\Repositories\TransactionsRepositoryInterface;
use App\Http\Domain\Repositories\UserRepositoryInterface;
use App\Http\Infrastructure\Persistence\TransactionsRepository;
use App\Http\Infrastructure\Persistence\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(TransactionsRepositoryInterface::class, TransactionsRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
