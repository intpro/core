<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Named;
use Interpro\Core\Contracts\Taxonomy\Fields\RefField as RefFieldInterface;
use Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection as SubsCollectionInterface;
use Interpro\Core\Contracts\Taxonomy\Types\AggrType;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class SubsCollection extends NamedCollection implements SubsCollectionInterface
{
    private $ref_name;
    private $refType;
    private $cap;

    public function __construct($ref_name, AggrType $refType, $cap = false)
    {
        $this->ref_name = $ref_name;
        $this->refType = $refType;
        $this->cap = $cap;
    }

    /**
     * @return bool
     */
    public function cap()
    {
        return $this->cap;
    }

    /**
     * Коллекция сама является элементом коллекции SubRefNamedCollectionSet по имени
     *
     * @return string
     */
    public function getName()
    {
        return $this->ref_name;
    }

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Fields\RefField
     */
    public function addByRef(RefFieldInterface $ref)
    {
        if($ref->getFieldType() !== $this->refType)
        {
            throw new TaxonomyException('Попытка добаления ссылки типа'.$ref->getFieldTypeName().' в колекцию ссылок типа '.$this->refType->getName().'!');
        }

        $type = $ref->getOwnerType();

        $key = $type->getName();

        if(!in_array($key, $this->item_names))
        {
            $this->item_names[] = $key;
        }

        $this->items[$key] = $type;
    }

    /**
     * @return array
     */
    public function getSubNames()
    {
        return $this->item_names;
    }

    protected function addByName(Named $item)
    {
        //Метод не используется, имя берется от имени хозяина ссылки
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getSub($ref_owner_name)
    {
        return $this->getByName($ref_owner_name);
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найдена ссылка типа '.$this->refType->getName().' по имени '.$this->ref_name.' для хозяина типа '.$name.'!');
    }

}
