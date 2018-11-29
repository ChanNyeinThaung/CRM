<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('delete-complain', function($user, $complain) {
            if($user->role == 2) return true;
            if($complain->user_id == $user->id) return true;

            return false;
        });

        Gate::define('change-status', function($user) {
            if($user->role == 2) return true;

            return false;
        });

        Gate::define('change-assign', function($user) {
            if($user->role == 2) return true;

            return false;
        });
    }
}
