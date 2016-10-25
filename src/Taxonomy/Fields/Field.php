<?php

namespace Interpro\Core\Taxonomy\Fields;

use Interpro\Core\Contracts\Taxonomy\Fields\Field as FieldInterface;
use Interpro\Core\Contracts\Taxonomy\Types\Type;

abstract class Field implements FieldInterface
{
    protected $owner;
    protected $field;
    protected $name;
    protected $field_type_name;

    public function getOwnerType()
    {
        return $this->owner;
    }

    public function getFieldType()
    {
        return $this->field;
    }

    public function getFieldTypeName()
    {
        return $this->field_type_name;
    }

    public function getName()
    {
        return $this->name;
    }

    protected function setFType(Type $type)
    {
        $this->field = $type;
    }
}
