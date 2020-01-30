<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use DB;

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
    public $key;
    public function boot()
    {
        $this->registerPolicies();

        $permitions=DB::table('permissions')->get();
        //dd($permitions[0]->key);

        foreach($permitions as $key)
        {
        $this->key=$key->key;
         Gate::define($this->key, function ($user) {
             return $user->hasPermission($this->key);
            }); 

        };

 
        /*     
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
