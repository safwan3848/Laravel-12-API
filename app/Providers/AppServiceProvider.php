<?php

namespace App\Providers;

use App\Models\Booking;
use App\Policies\BookingPolicy;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Add Policy
        Gate::policy(Booking::class, BookingPolicy::class);
        
        // Add Custom Rate Limit For Role Wise
        RateLimiter::for('custom-booking-limit', function ($request) {
            $user = $request->user();

            if ($user && $user->role == "super admin") {
                return Limit::none();
            }
            if ($user && $user->role == "admin") {
                return Limit::perMinute('3')->by($user->id);
            }

            return Limit::perMinute(1)->by(optional($user)->id ?: $request->ip);
        });
    }
}
