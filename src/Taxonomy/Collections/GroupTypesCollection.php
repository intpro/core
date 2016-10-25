<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\GroupType;
use Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection as GroupTypesCollectionInterface;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class GroupTypesCollection extends NamedCollection implements GroupTypesCollectionInterface
{
    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function getType($name)
    {
        return $this->getType($name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function addType(GroupType $type)
    {
        $this->addByName($type);
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найден тип группы по имени '.$name.'!');
    }
}
