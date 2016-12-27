<?php

namespace Interpro\Core\Taxonomy\Fields;

use Interpro\Core\Contracts\Taxonomy\Fields\Field as FieldInterface;
use Interpro\Core\Contracts\Taxonomy\Types\Type;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Taxonomy\Types\AggrType;

abstract class Field implements FieldInterface
{
    protected $owner;
    protected $type;
    protected $name;
    protected $field_type_name;

    /**
     * @return void
     */
    public function __construct(AggrType $ownerType, $name, $field_type_name)
    {
        $this->owner = $ownerType;
        $this->name = $name;
        $this->field_type_name = $field_type_name;
        $this->type = null;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getOwnerType()
    {
        return $this->owner;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getFieldType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getFieldTypeName()
    {
        return $this->field_type_name;
    }

    /**
     * @return string
     */
    public function getFieldTypeFamily()
    {
        if($this->type)
        {
            return $this->type->getFamily();
        }
        else
        {
            throw new TaxonomyException('Получение информации о поле до установки типа!');
        }
    }

    /**
     * @return string
     */

    public function getOwnerTypeName()
    {
        return $this->owner->getName();
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getRank()
    {
        if($this->type)
        {
            return $this->type->getRank();
        }
        else
        {
            throw new TaxonomyException('Получение ранга поля до установки типа!');
        }
    }

    /**
     * @return int
     */
    public function getMode()
    {
        if($this->type)
        {
            return $this->type->getMode();
        }
        else
        {
            throw new TaxonomyException('Получение режима поля до установки типа!');
        }
    }

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Types\Type $type
     */
    protected function setFType(Type $type)
    {
        $this->type = $type;
    }
}
