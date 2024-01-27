<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (!function_exists('formatFileSize')) {
            function formatFileSize($path)
            {
                $size = filesize(public_path($path));
                $units = ['B', 'KB', 'MB', 'GB', 'TB'];

                for ($i = 0; $size > 1024; $i++) {
                    $size /= 1024;
                }

                return round($size, 2) . ' ' . $units[$i];
            }
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // ...
    }
}