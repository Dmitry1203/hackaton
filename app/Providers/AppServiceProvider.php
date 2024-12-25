<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }


    public function boot()
    {

        // здесь также можно указать глобальную переменную для всех шаблонов
        // также есть компоновщик
        // View::share('global_var', 'test');
        DB::listen(function ($jquery){
            // показать все sql запросы
            // dump($jquery->sql);

            // логирование запросов в отдельный канал sqllogs
            // Log::Channel('sqllogs')->info($jquery->sql);
        });



    }
}
