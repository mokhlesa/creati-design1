<?php

namespace App\Providers;

use App\Models\Setting;
use App\Models\SocialLink;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.public', function ($view) {
            $view->with('socialLinks', SocialLink::all());
            $view->with('settings', Setting::all()->keyBy('key'));
        });
    }
}