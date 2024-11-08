<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Penghimpunan;
use App\Models\User;
use App\Policies\PenghimpunanPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Penghimpunan::class => PenghimpunanPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('admin', function (User $user) {
            $user->hasRole('admin');
        });
    }
}
