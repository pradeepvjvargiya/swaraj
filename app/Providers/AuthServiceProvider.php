<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        Gate::define('edit_profile', function (User $user, User $profileUser) {
            return $user->role === 'super-admin' || $user->id === $profileUser->id;
        });

        Gate::define('super_admin', function (User $user) {
            // dd($user);
            return $user->role == 'super-admin';
        });
    }
}
