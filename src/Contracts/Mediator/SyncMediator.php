<?php

namespace Interpro\Core\Contracts\Mediator;

use Interpro\Core\Contracts\Executor\ASynchronizer;
use Interpro\Core\Contracts\Executor\OwnSynchronizer;

interface SyncMediator
{
    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\ASynchronizer
     */
    public function getASynchronizer($family);

    /**
     * @param \Interpro\Core\Contracts\Executor\ASynchronizer
     *
     * @return void
     */
    public function registerASynchronizer(ASynchronizer $synchronizer);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\OwnSynchronizer
     */
    public function getOwnSynchronizer($family);

    /**
     * @param \Interpro\Core\Contracts\Executor\OwnSynchronizer
     *
     * @return void
     */
    public function registerOwnSynchronizer(OwnSynchronizer $synchronizer);
}
