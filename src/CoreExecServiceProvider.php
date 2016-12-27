<?php

namespace Interpro\Core;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class CoreExecServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
        Log::info('Загрузка CoreExecServiceProvider');
    }

    /**
     * @return void
     */
    public function register()
    {
        Log::info('Регистрация CoreExecServiceProvider');

        $this->app->singleton(
            'Interpro\Core\Contracts\Mediator\InitMediator',
            'Interpro\Core\Mediators\InitMediator'
        );

        $this->app->singleton(
            'Interpro\Core\Contracts\Mediator\SyncMediator',
            'Interpro\Core\Mediators\SyncMediator'
        );

        $this->app->singleton(
            'Interpro\Core\Contracts\Mediator\UpdateMediator',
            'Interpro\Core\Mediators\UpdateMediator'
        );

        $this->app->singleton(
            'Interpro\Core\Contracts\Mediator\DestructMediator',
            'Interpro\Core\Mediators\DestructMediator'
        );

        $this->app->singleton(
            'Interpro\Core\Contracts\Mediator\RefConsistMediator',
            'Interpro\Core\Mediators\RefConsistMediator'
        );
    }

}
