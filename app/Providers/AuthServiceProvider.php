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

        /*Gate::define('contratos', function ($user) {
         return $user->hasPermission('contratos');
        });       
        Gate::define('apagar-contratos', function ($user) {
         return $user->hasPermission('apagar-contratos');
        });       
         Gate::define('apagar-recibos', function ($user) {
         return $user->hasPermission('apagar-recibos');
        });      
         Gate::define('apagar-avisos', function ($user) {
         return $user->hasPermission('apagar-avisos');
        }); */
    }
}
