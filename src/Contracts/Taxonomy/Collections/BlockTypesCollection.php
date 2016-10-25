<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\BlockType;

interface BlockTypesCollection extends NamedCollection
{
    /**
     * @param string $name
     *
     * @param \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     */
    public function getType($name);

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     */
    public function addType(BlockType $type);
}
