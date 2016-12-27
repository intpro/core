<?php

namespace Interpro\Core\Contracts\Mediator;

use Interpro\Core\Contracts\Executor\AInitializer;
use Interpro\Core\Contracts\Executor\BInitializer;
use Interpro\Core\Contracts\Executor\CInitializer;

interface InitMediator
{
    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\AInitializer
     */
    public function getAInitializer($family);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\BInitializer
     */
    public function getBInitializer($family);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\CInitializer
     */
    public function getCInitializer($family);

    /**
     * @param \Interpro\Core\Contracts\Executor\AInitializer
     *
     * @return void
     */
    public function registerAInitializer(AInitializer $initializer);

    /**
     * @param \Interpro\Core\Contracts\Executor\BInitializer
     *
     * @return void
     */
    public function registerBInitializer(BInitializer $initializer);

    /**
     * @param \Interpro\Core\Contracts\Executor\CInitializer
     *
     * @return void
     */
    public function registerCInitializer(CInitializer $initializer);
}
