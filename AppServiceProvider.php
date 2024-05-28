<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Models\User; // Import the correct User class

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Registering policies if needed
        // Gate::policy(User::class, UserPolicy::class);

        // Defining Gates
        Gate::define('isAdmin', function ($user) {
            return $user->Role === 'Admin';
        });

       

        Paginator::useBootstrap();
    }
}
