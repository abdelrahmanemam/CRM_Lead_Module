<?php

namespace App\Providers;

use App\Http\Interfaces\LeadAttributeInterface;
use App\Http\Interfaces\LeadInterface;
use App\Http\Repositories\LeadAttributeRepository;
use App\Http\Repositories\LeadRepository;
use App\Http\Repositories\UserRepository;
use App\Http\Interfaces\UserInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(LeadInterface::class, LeadRepository::class);
        $this->app->bind(LeadAttributeInterface::class, LeadAttributeRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
