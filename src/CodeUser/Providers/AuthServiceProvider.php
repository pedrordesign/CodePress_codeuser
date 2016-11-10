<?php

namespace CodePress\CodeUser\Providers;

use CodePress\CodeUser\Repository\PermissionRepositoryInterface;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        if(!app()->runningInConsole()) {
            /** @var $permissionRepositoryInterface $permissionRepository */
            $permissionRepository = app(PermissionRepositoryInterface::class);
            $permissions = $permissionRepository->all();
            foreach ($permissions as $permission) {

                Gate::define($permission->name, function ($user) use ($permission) {
                    return $user->isAdmin() || $user->hasRole($permission->roles);
                });

            }
        }
    }
}
