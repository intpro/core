<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Ref\ARef;

interface AUpdateExecutor extends Mediatable
{
    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     * @param array $values
     *
     * @return void
     */
    public function update(ARef $ref, array $values);
}
