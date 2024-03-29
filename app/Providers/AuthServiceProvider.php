<?php

namespace App\Providers;

use App\Policies\ProductPolicy;
use App\Models\Product;
use App\Models\UserRole;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Product::class => ProductPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        Gate::define('accessAdminPanel', function ($user) {
            return $user->hasRole([UserRole::ADMIN, UserRole::COURIER, UserRole::MANAGER, UserRole::PARTNER]);
        });
    }
}
