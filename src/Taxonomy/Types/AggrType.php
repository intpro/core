<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Taxonomy\Collections\FieldsCollection;
use Interpro\Core\Taxonomy\Collections\SubRefNamedCollectionSet;
use Interpro\Core\Contracts\Taxonomy\Fields\OwnField as OwnFieldInterface;
use Interpro\Core\Contracts\Taxonomy\Fields\RefField as RefFieldInterface;
use Interpro\Core\Contracts\Taxonomy\Types\AggrType as AggrTypeInterface;

abstract class AggrType extends ProType implements AggrTypeInterface
{
    private $fields;
    private $owns;
    private $refs;
    private $subs;

    /**
     * @param string $name
     * @param string $family
     *
     * @return void
     */
    public function __construct($name, $family)
    {
        parent::__construct($name, $family);

        $this->initCollections();
    }

    protected function initCollections()
    {
        $this->fields = new FieldsCollection();
        $this->owns   = new FieldsCollection();
        $this->refs   = new FieldsCollection();
        $this->subs   = new SubRefNamedCollectionSet($this);
    }

    public function addOwn(OwnFieldInterface $field)
    {
        $this->owns->addField($field);
        $this->fields->addField($field);
    }

    public function addRef(RefFieldInterface $field)
    {
        $this->refs->addField($field);
        $this->fields->addField($field);
    }

    public function addSub(RefFieldInterface $field)
    {
        $this->subs->addRef($field);
    }

    private function getFieldsCollection(FieldsCollection $collection, $field_type_name = 'all')
    {
        if($field_type_name === 'all')
        {
            return $collection;
        }
        else
        {
            return $collection->getTyped($field_type_name);
        }
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\FieldsCollection
     */
    public function getOwns($field_type_name = 'all')
    {
        return $this->getFieldsCollection($this->owns, $field_type_name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\FieldsCollection
     */
    public function getRefs($field_type_name = 'all')
    {
        return $this->getFieldsCollection($this->refs, $field_type_name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\FieldsCollection
     */
    public function getFields($field_type_name = 'all')
    {
        return $this->getFieldsCollection($this->fields, $field_type_name);
    }

    /**
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getSubs($ref_name)
    {
        return $this->subs->getSubRefs($ref_name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubRefNamedCollectionSet
     */
    public function getSubsSet()
    {
        return $this->subs;
    }

    /**
     * @param string $field_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     *
     */
    public function getFieldType($field_name)
    {
        return $this->fields->getFieldType($field_name);
    }

    /**
     * @param string $field_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     *
     */
    public function getField($field_name)
    {
        return $this->fields->getField($field_name);
    }

    /**
     * @param string $own_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     *
     */
    public function getOwn($own_name)
    {
        return $this->owns->getField($own_name);
    }

    /**
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     *
     */
    public function getRef($ref_name)
    {
        return $this->refs->getField($ref_name);
    }

    /**
     * @param string $field_name
     *
     * @return bool
     *
     */
    public function fieldExist($field_name)
    {
        return $this->fields->exist($field_name);
    }

    /**
     * @param string $ref_name
     *
     * @return bool
     *
     */
    public function refExist($ref_name)
    {
        return $this->refs->exist($ref_name);
    }

    /**
     * @param string $own_name
     *
     * @return bool
     *
     */
    public function ownExist($own_name)
    {
        return $this->owns->exist($own_name);
    }

}
