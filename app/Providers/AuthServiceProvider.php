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
        //为User模型指定授权策略
        \App\Http\Models\User::class => \App\Policies\UserPolicy::class,
        //为Group模型指定授权策略
        \App\Http\Models\Group::class  => \App\Policies\GroupPolicy::class,
        //为log模型指定授权策略
        \App\Http\Models\Log::class  => \App\Policies\LogPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
