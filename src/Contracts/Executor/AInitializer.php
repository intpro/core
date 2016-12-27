<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Taxonomy\Types\AType;

interface AInitializer extends Mediatable
{
    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\AType $type
     * @param array $defaults
     *
     * @return \Interpro\Core\Contracts\Ref\ARef
     */
    public function init(AType $type, array $defaults = []);
}
