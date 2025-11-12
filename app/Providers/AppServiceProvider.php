<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // يجب أن يكون هذا القسم فارغاً إلا إذا كنت تضيف خدمات معينة
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // يجب أن يكون هذا القسم فارغاً إلا إذا كنت تستخدم Schemas أو غيره
    }
}