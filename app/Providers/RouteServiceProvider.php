<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/homepage'; // Default redirection for non-admin users

    /**
     * Define your route model bindings, pattern filters, etc.
     */
    public function boot()
    {
        parent::boot();

        // Redirect users based on their role after login
        \Illuminate\Support\Facades\Auth::viaRequest('web', function () {
            $user = auth()->user();
            if ($user) {
                // Check if user is an admin and redirect to admin dashboard
                if ($user->hasRole('admin')) {
                    return redirect()->route('admin.dashboard');
                }
            }

            // Default redirect for regular users
            return redirect()->route('homepage');
        });
    }

    /**
     * Configure the routes for the application.
     */
    public function map()
    {
        $this->mapWebRoutes();
        $this->mapApiRoutes();
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }

    protected function mapApiRoutes()
    {
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}
