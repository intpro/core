<?php

namespace Interpro\Core;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class CoreServiceProvider extends ServiceProvider {

    /**
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {

    }

    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'Interpro\Core\Contracts\Taxonomy\TypeRegistrator',
            'Interpro\Core\Taxonomy\TypeRegistrator'
        );
    }

}
