<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Fields\RefField as RefFieldInterface;
use Interpro\Core\Contracts\Taxonomy\Collections\SubRefNamedCollectionSet as SubRefNamedCollectionSetInterface;
use Interpro\Core\Contracts\Taxonomy\Types\AggrType;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class SubRefNamedCollectionSet extends NamedCollection implements SubRefNamedCollectionSetInterface
{
    private $refType;
    private $all;

    public function __construct(AggrType $refType)
    {
        $this->refType = $refType;

        $this->all = new SubsCollection('all', $this->refType);
    }

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Fields\RefField
     */
    public function addRef(RefFieldInterface $ref)
    {
        if($ref->getFieldType() !== $this->refType)
        {
            throw new TaxonomyException('Попытка добаления ссылки типа'.$ref->getFieldTypeName().' в колекцию ссылок типа '.$this->refType->getName().'!');
        }

        $ref_name = $ref->getName();

        if(!$this->exist($ref_name))
        {
            $refs = new SubsCollection($ref_name, $this->refType);
            $this->addByName($refs);
        }
        else
        {
            $refs = $this->getByName($ref_name);
        }

        $refs->addByRef($ref);

        $this->all->addByRef($ref);
    }

    /**
     * @return array
     */
    public function getRefNames()
    {
        return $this->item_names;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getSubRefs($ref_name)
    {
        if($ref_name === 'all')
        {
            return $this->all;
        }
        elseif($this->exist($ref_name))
        {
            return $this->getByName($ref_name);
        }
        else
        {
            $refs = new SubsCollection($ref_name, $this->refType, true);
            $this->addByName($refs);

            return $refs;
        }
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найдена коллекция ссылок на тип '.$this->refType->getName().' по имени ссылки '.$name.'!');
    }

}
