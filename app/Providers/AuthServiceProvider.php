<?php

namespace App\Providers;

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
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('create-data',function($user){
            return $user->hasAnyRoles(['Admin']);
        });
        Gate::define('edit-data',function($user){
            return $user->hasAnyRoles(['Admin','Author']);
        });
        Gate::define('delete-data',function($user){
            return $user->hasRole('Admin');
        });

        Gate::define('manage-users',function($user){
            return $user->hasAnyRoles(['Admin','Author']);
        });
        Gate::define('manage-general',function($user){
            return $user->hasAnyRoles(['Admin','Author']);
        });
        

        
        //
    }
}
