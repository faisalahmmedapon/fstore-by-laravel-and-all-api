<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{

    public const HOME = '/admin/dashboard';


    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });


        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api/v1')
                ->group(function ($router){
                   require base_path('routes/api/api.php');
                   require base_path('routes/api/backend/api_for_backend.php');
                   require base_path('routes/api/frontend/api_for_frontend.php');
                });

            Route::middleware('web')
                ->group(base_path('routes/web.php'));
        });
    }
}
