<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
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

    protected $policies=[];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::policy(User::class, 'registerPolicies');

        Gate::define('isAdmin',function(User $user) {
           return $user->userLevel==0;
        });

        Gate::define('isAdmin', function (User $user) {
            return $user->id === 1; // Assuming admin ID is 1
        });
        
        Paginator::useBootstrap();
    }
}
