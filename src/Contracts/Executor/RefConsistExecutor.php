<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Ref\ARef;

//Нашедшие себя по ссылке superior должны решить как самоубиться или переподчиниться
interface RefConsistExecutor extends Mediatable
{
    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return void
     */
    public function execute(ARef $ref);

    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return bool
     */
    public function exist(ARef $ref);
}
