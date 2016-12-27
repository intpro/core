<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Ref\ARef;
use Interpro\Core\Contracts\Taxonomy\Fields\OwnField;

interface CUpdateExecutor extends Mediatable
{
    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     * @param \Interpro\Core\Contracts\Taxonomy\Fields\OwnField $own
     * @param mixed $value
     *
     * @return void
     */
    public function update(ARef $ref, OwnField $own, $value);
}
