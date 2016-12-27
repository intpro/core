<?php

namespace Interpro\Core\Contracts\Mediator;

use Interpro\Core\Contracts\Executor\RefConsistExecutor;
use Interpro\Core\Contracts\Ref\ARef;

interface RefConsistMediator
{
    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\RefConsistExecutor
     */
    public function getRefConsistExecutor($family);

    /**
     * @param \Interpro\Core\Contracts\Executor\RefConsistExecutor
     *
     * @return void
     */
    public function registerRefConsistExecutor(RefConsistExecutor $refConsistExecutor);

    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return void
     */
    public function notify(ARef $ref);

    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return bool
     */
    public function exist(ARef $ref);
}
