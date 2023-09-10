<?php

namespace App\Providers;

use App\Repositories\Reimbursement\ReimbursementsRepository;
use App\Repositories\Reimbursement\ReimbursementsRepositoryImp;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Roles\RoleRepositoryImp;
use App\Services\Auth\AuthService;
use App\Services\Auth\AuthServiceImp;
use App\Services\User\UserServicelmp;
use App\Services\User\UserService;


use Illuminate\Support\ServiceProvider;
use App\Repositories\User\UserRepository;
use App\Repositories\User\UserRepositoryImp;

use App\Services\Reimbursement\ReimbursementService;
use App\Services\Reimbursement\ReimbursementServiceImp;
use App\Services\Roles\RoleService;
use App\Services\Roles\RoleServiceImp;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Services Binding
        $this->app->bind(AuthService::class, AuthServiceImp::class);
        $this->app->bind(UserService::class, UserServicelmp::class);
        $this->app->bind(RoleService::class, RoleServiceImp::class);
        $this->app->bind(ReimbursementService::class, ReimbursementServiceImp::class);

        // Repositories Binding
        $this->app->bind(UserRepository::class, UserRepositoryImp::class);
        $this->app->bind(RoleRepository::class, RoleRepositoryImp::class);
        $this->app->bind(ReimbursementsRepository::class, ReimbursementsRepositoryImp::class);


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        config(['app.locale' => 'id']);
        \Carbon\Carbon::setLocale('id');
        date_default_timezone_set('Asia/Jakarta');
    }
}
