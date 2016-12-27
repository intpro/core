<?php

namespace Interpro\Core\Taxonomy\Fields;

use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Taxonomy\Types\AggrType;
use Interpro\Core\Contracts\Taxonomy\Fields\RefField as RefFieldInterface;

class RefField extends Field implements RefFieldInterface
{

    public function setFieldType(AggrType $fieldType)
    {
        $ownerType = $this->getOwnerType();

        if($this->field_type_name !== $fieldType->getName())
        {
            throw new TaxonomyException('Не соответствует устанавливаемый тип поля ('.$this->field_type_name.'->'.$fieldType->getName().')!');
        }

        if($fieldType->getMode() === TypeMode::MODE_C)
        {
            throw new TaxonomyException('На тип с поведением С нельзя ссылаться ('.$ownerType->getName().'->'.$fieldType->getName().')!');
        }

        if($ownerType->getMode() === TypeMode::MODE_A and $fieldType->getMode() !== TypeMode::MODE_A)
        {
            throw new TaxonomyException('Тип с поведением А не может иметь в качестве ссылки типы с поведением B и C ('.$ownerType->getName().'->'.$fieldType->getName().')!');
        }

        //Тип с поведение B ссылаться может только на типы B в своем пакете
        if($ownerType->getMode() === TypeMode::MODE_B and
            ($fieldType->getMode() !== TypeMode::MODE_B or
                $ownerType->getFamily() !== $fieldType->getFamily())
        )
        {
            throw new TaxonomyException('Тип с поведением B может иметь в качестве ссылки только тип B из своего пакета ('.$ownerType->getName().'->'.$fieldType->getName().')!');
        }

        $this->setFType($fieldType);
    }
}
