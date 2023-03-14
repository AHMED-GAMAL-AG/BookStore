<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;


use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // 0 normal user , 1 admin , 2 super admin
        Gate::define('update-books', function ($user) {
            return $user->isAdmin(); // an admin or suer admin can update books
        });

        Gate::define('update-users', function ($user) {
            return $user->isSuperAdmin(); // only super admin can update users
        });
    }
}
