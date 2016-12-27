<?php

namespace Interpro\Core\Taxonomy\Fields;

use Interpro\Core\Contracts\Taxonomy\Types\Type;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Contracts\Taxonomy\Fields\OwnField as OwnFieldInterface;

class OwnField extends Field implements OwnFieldInterface
{

    public function setFieldType(Type $fieldType)
    {
        $ownerType = $this->getOwnerType();

        if($this->field_type_name !== $fieldType->getName())
        {
            throw new TaxonomyException('Не соответствует устанавливаемый тип поля ('.$this->field_type_name.'->'.$fieldType->getName().')!');
        }

        if($fieldType->getMode() === TypeMode::MODE_A)
        {
            throw new TaxonomyException('Тип с поведением А не может быть использован в качетсве собственого поля ('.$this->getOwnerType()->getName().'->'.$fieldType->getName().')!');
        }

        if($ownerType->getMode() === TypeMode::MODE_C)
        {
            throw new TaxonomyException('Тип с поведением С не может иметь в качестве поля какой-либо другой тип ('.$ownerType->getName().'->'.$fieldType->getName().')!');
        }

        //Тип с поведение B ссылаться может только на типы B в своем пакете
        if($ownerType->getMode() === TypeMode::MODE_B and $fieldType->getMode() === TypeMode::MODE_B and $ownerType->getFamily() !== $fieldType->getFamily())
        {
            throw new TaxonomyException('Тип с поведением B может иметь в качестве поля только тип B из своего пакета ('.$ownerType->getName().'->'.$fieldType->getName().')!');
        }

        $this->setFType($fieldType);
    }
}
