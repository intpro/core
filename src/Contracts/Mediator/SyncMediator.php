<?php

namespace Interpro\Core\Contracts\Mediator;

use Interpro\Core\Contracts\Executor\ASynchronizer;
use Interpro\Core\Contracts\Executor\OwnSynchronizer;
use Interpro\Core\Contracts\Executor\PredefinedGroupItemsSynchronizer;

interface SyncMediator
{
    /**
     * @param \Interpro\Core\Contracts\Executor\PredefinedGroupItemsSynchronizer
     *
     * @return void
     */
    public function registerPredefinedGroupItemsSynchronizer(PredefinedGroupItemsSynchronizer $synchronizer);

    /**
     * @return void
     */
    public function syncPredefinedGroupItems();

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
