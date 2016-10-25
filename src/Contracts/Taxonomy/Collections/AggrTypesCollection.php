<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\AggrType;

interface AggrTypesCollection extends NamedCollection
{
    /**
     * @param string $name
     *
     * @param \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getType($name);

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function addType(AggrType $type);
}
