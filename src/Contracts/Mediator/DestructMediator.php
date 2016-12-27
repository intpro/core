<?php

namespace Interpro\Core\Contracts\Mediator;

use Interpro\Core\Contracts\Executor\ADestructor;
use Interpro\Core\Contracts\Executor\BDestructor;
use Interpro\Core\Contracts\Executor\CDestructor;

interface DestructMediator
{
    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\ADestructor
     */
    public function getADestructor($family);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\BDestructor
     */
    public function getBDestructor($family);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\CDestructor
     */
    public function getCDestructor($family);

    /**
     * @param \Interpro\Core\Contracts\Executor\ADestructor
     *
     * @return void
     */
    public function registerADestructor(ADestructor $destructor);

    /**
     * @param \Interpro\Core\Contracts\Executor\BDestructor
     *
     * @return void
     */
    public function registerBDestructor(BDestructor $destructor);

    /**
     * @param \Interpro\Core\Contracts\Executor\CDestructor
     *
     * @return void
     */
    public function registerCDestructor(CDestructor $destructor);

}
