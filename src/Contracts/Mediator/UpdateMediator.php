<?php

namespace Interpro\Core\Contracts\Mediator;

use Interpro\Core\Contracts\Executor\AUpdateExecutor;
use Interpro\Core\Contracts\Executor\BUpdateExecutor;
use Interpro\Core\Contracts\Executor\CUpdateExecutor;

interface UpdateMediator
{
    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\AUpdateExecutor
     */
    public function getAUpdateExecutor($family);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\BUpdateExecutor
     */
    public function getBUpdateExecutor($family);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\CUpdateExecutor
     */
    public function getCUpdateExecutor($family);

    /**
     * @param \Interpro\Core\Contracts\Executor\AUpdateExecutor
     *
     * @return void
     */
    public function registerAUpdateExecutor(AUpdateExecutor $updateExecutor);

    /**
     * @param \Interpro\Core\Contracts\Executor\BUpdateExecutor
     *
     * @return void
     */
    public function registerBUpdateExecutor(BUpdateExecutor $updateExecutor);

    /**
     * @param \Interpro\Core\Contracts\Executor\CUpdateExecutor
     *
     * @return void
     */
    public function registerCUpdateExecutor(CUpdateExecutor $updateExecutor);
}
