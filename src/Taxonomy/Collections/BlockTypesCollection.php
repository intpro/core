<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\BlockType;
use Interpro\Core\Contracts\Taxonomy\Collections\BlockTypesCollection as BlockTypesCollectionInterface;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class BlockTypesCollection extends NamedCollection implements BlockTypesCollectionInterface
{
    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     */
    public function getType($name)
    {
        return $this->getByName($name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     */
    public function addType(BlockType $type)
    {
        $this->addByName($type);
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найден тип блока по имени '.$name.'!');
    }
}
