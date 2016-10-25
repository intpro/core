<?php

namespace Interpro\Core;

use Illuminate\Bus\Dispatcher;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\ServiceProvider;

class CoreDeferServiceProvider extends ServiceProvider {

    protected $defer = true;

    /**
     * @return void
     */
    public function boot(Dispatcher $dispatcher)
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'Interpro\Core\Contracts\Taxonomy\Factory\TaxonomyFactory',
            'Interpro\Core\Taxonomy\Factory\TaxonomyFactory'
        );

        $this->app->singleton(
            'Interpro\Core\Contracts\Taxonomy\Taxonomy',
            function($app)
            {
                //Все типы необходимо зарегистрировать до этого момента
                $registrator = $app->make('Interpro\Core\Contracts\Taxonomy\TypeRegistrator');
                $factory = $app->make('Interpro\Core\Contracts\Taxonomy\Factory\TaxonomyFactory');
                return $factory->createTaxonomy($registrator->getCollection());
            }
        );
    }

    /**
     * @return array
     */
    public function provides()
    {
        return [
            'Interpro\Core\Contracts\Taxonomy\Factory\TaxonomyFactory',
            'Interpro\Core\Contracts\Taxonomy\Taxonomy'
        ];
    }

}
