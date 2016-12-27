<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Ref\ARef;

interface BDestructor extends Mediatable
{
    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return void
     */
    public function delete(ARef $ref);
}
