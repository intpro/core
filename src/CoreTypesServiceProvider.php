<?php

namespace Interpro\Core;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class CoreTypesServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
        //Log::info('Загрузка CoreTypesServiceProvider');
    }

    /**
     * @return void
     */
    public function register()
    {
        //Log::info('Регистрация CoreTypesServiceProvider');

        $this->app->singleton(
            'Interpro\Core\Contracts\Taxonomy\TypesForecastList',
            'Interpro\Core\Taxonomy\TypesForecastList'
        );

        $this->app->singleton(
            'Interpro\Core\Contracts\Taxonomy\TypeRegistrator',
            'Interpro\Core\Taxonomy\TypeRegistrator'
        );
    }

}
