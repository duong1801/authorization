<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Modules;
use App\Policies\PostPolicy;
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
        Post::class=> PostPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {

        $this->registerPolicies();
        
        // $modules = Modules::all();
        // if($modules->count()>0){
        //     foreach ($modules as $module) {
        //         Gate::define($module->name, function (User $user) use ($module) {
        //             $roleArr = $user->group->permission;
        //             $check = isRole($roleArr, $module->name);
        //             return $check;
        //         });
        //         Gate::define($module->name.'.edit', function (User $user) use ($module) {
        //             $roleArr = $user->group->permission;
        //             $check = isRole($roleArr, $module->name,'edit');
        //            return $check;
        //         });
        //     }
           
        // }
      
    }
}