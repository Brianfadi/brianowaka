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
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS URLs in production
        if ($this->app->environment('production')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        // Share settings with all views for WhatsApp button and other global elements
        view()->composer('*', function ($view) {
            if (!$view->offsetExists('settings')) {
                $profilePhotoPath = \App\Models\Setting::get('profile_photo');
                $settings = [
                    'site_name'     => \App\Models\Setting::get('site_name', 'Brian Owaka'),
                    'contact_email' => \App\Models\Setting::get('contact_email', 'brian@brianowaka.com'),
                    'contact_phone' => \App\Models\Setting::get('contact_phone', '+254 712 345 678'),
                    'profile_photo' => $profilePhotoPath ? \Illuminate\Support\Facades\Storage::url($profilePhotoPath) : null,
                ];
                $view->with('settings', $settings);
            }
        });

        // Share topbar data (contact + social) with all views, independent of page-specific $settings
        view()->composer('*', function ($view) {
            $view->with('topbar', [
                'contact_email' => \App\Models\Setting::get('contact_email', 'brian@brianowaka.com'),
                'contact_phone' => \App\Models\Setting::get('contact_phone', '+254 712 345 678'),
                'contact_location' => \App\Models\Setting::get('contact_location', 'Nairobi, Kenya'),
                'social_github'    => \App\Models\Setting::get('social_github'),
                'social_linkedin'  => \App\Models\Setting::get('social_linkedin'),
                'social_twitter'   => \App\Models\Setting::get('social_twitter'),
                'social_facebook'  => \App\Models\Setting::get('social_facebook'),
                'social_instagram' => \App\Models\Setting::get('social_instagram'),
                'social_youtube'   => \App\Models\Setting::get('social_youtube'),
            ]);
        });
    }
}
