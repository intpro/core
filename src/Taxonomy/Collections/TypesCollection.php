<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Types\Type;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Contracts\Taxonomy\Collections\TypesCollection as TypesCollectionInterface;

class TypesCollection extends NamedCollection implements TypesCollectionInterface
{
    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getType($name)
    {
        return $this->getByName($name);
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найден тип по имени '.$name.'!');
    }

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function addType(Type $type)
    {
        $this->addByName($type);
    }
}
