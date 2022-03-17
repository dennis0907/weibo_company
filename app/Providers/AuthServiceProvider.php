<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //修改偵測的邏輯
        Gate::guessPolicyNamesUsing(function ($modelClass) {
            //動態返回model對應的政策名稱 App\Models\User => App\Policies\UserPolicy
            return 'App\Policies\\'.class_basename($modelClass).'Policy';
        });
    }
}
