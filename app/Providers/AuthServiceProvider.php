<?php

namespace App\Providers;

use App\Models\Producto;
use App\Policies\ProductoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies =[
        Producto::class => ProductoPolicy::class,
    ];
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Gate::policy(Producto::class, ProductoPolicy::class);
    }
}
