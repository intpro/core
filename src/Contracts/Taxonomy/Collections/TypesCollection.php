<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\Type;

interface TypesCollection extends NamedCollection
{
    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getType($name);

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function addType(Type $type);
}
