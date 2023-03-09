<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Category;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Position;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;
use App\Policies\PositionPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [

            'App\Models\Category' => 'App\Policies\CategoryPolicy',
            'App\Models\Customer' => 'App\Policies\CustomerPolicy',
            'App\Models\Order' => 'App\Policies\OrderPolicy',
            'App\Models\Position' => 'App\Policies\PositionPolicy',
            'App\Models\Product' => 'App\Policies\ProductPolicy',
            'App\Models\Supplier' => 'App\Policies\SupplierPolicy',
            'App\Models\User' => 'App\Policies\UserPolicy',
            'App\Models\Brand' => 'App\Policies\BrandPolicy'
            // Category::class => CategoryPolicy::class,
            // Customer::class => CustomerPolicy::class,
            // Order::class => OrderPolicy::class,
            // Position::class => PositionPolicy::class,
            // Product::class => ProductPolicy::class,
            // Supplier::class => SupplierPolicy::class,
            // User::class => UserPolicy::class

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
