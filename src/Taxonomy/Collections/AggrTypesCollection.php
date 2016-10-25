<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\AggrType;
use Interpro\Core\Contracts\Taxonomy\Collections\AggrTypesCollection as AggrTypesCollectionInterface;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class AggrTypesCollection extends NamedCollection implements AggrTypesCollectionInterface
{
    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getType($name)
    {
        return $this->getByName($name);
    }

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function addType(AggrType $type)
    {
        $this->addByName($type);
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найден агрегатный тип по имени '.$name.'!');
    }
}
