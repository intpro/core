<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Taxonomy\Types\AType;

interface ASynchronizer extends Mediatable
{
    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\AType $type
     *
     * @return void
     */
    public function sync(AType $type);
}
