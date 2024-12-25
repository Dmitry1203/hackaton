<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class HelpersLoaderProvider extends ServiceProvider
{
    public function register()
    {
        $file = app_path('Helpers/helpers.php');
        if (file_exists($file)) {
            require_once($file);
        }
    }

    public function boot()
    {
        //
    }
}
