<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Policies\UserShopPolicy;
use App\Http\Models\Backend\UserShopModel;

use App\Policies\UserSupplierPolicy;
use App\Http\Models\Backend\UserSupplierModel;

use App\Policies\UserShopProductPolicy;
use App\Http\Models\Backend\UserShopProductModel;

use App\Policies\UserOrderPolicy;
use App\Http\Models\Frontend\UserOrderModel;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        UserShopModel::class => UserShopPolicy::class,
		UserSupplierModel::class => UserSupplierPolicy::class,
		UserShopProductModel::class => UserShopProductPolicy::class,
		UserOrderModel::class => UserOrderPolicy::class,
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
