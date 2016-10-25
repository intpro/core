<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\GroupType;

interface GroupTypesCollection extends NamedCollection
{
    /**
     * @param string $name
     *
     * @param \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function getType($name);

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function addType(GroupType $type);
}
