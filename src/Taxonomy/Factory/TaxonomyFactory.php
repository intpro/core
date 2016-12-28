<?php

namespace Interpro\Core\Taxonomy\Factory;

use Illuminate\Support\Facades\Log;
use Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection;
use Interpro\Core\Contracts\Taxonomy\Manifest\Aggregate;
use Interpro\Core\Contracts\Taxonomy\Manifest\Own;
use Interpro\Core\Contracts\Taxonomy\Types\Type;
use Interpro\Core\Taxonomy\Collections\BlockTypesCollection;
use Interpro\Core\Taxonomy\Collections\GroupTypesCollection;
use Interpro\Core\Taxonomy\Collections\TypesCollection;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Taxonomy\Fields\OwnField;
use Interpro\Core\Taxonomy\Fields\RefField;
use Interpro\Core\Taxonomy\Taxonomy;
use Interpro\Core\Taxonomy\Types\AggrType;
use Interpro\Core\Taxonomy\Types\BlockType;
use Interpro\Core\Taxonomy\Types\BModeType;
use Interpro\Core\Taxonomy\Types\GroupType;
use Interpro\Core\Taxonomy\Types\CType;
use Interpro\Core\Contracts\Taxonomy\Fields\RefField as RefFieldInterface;
use Interpro\Core\Contracts\Taxonomy\Fields\OwnField as OwnFieldInterface;

class TaxonomyFactory
{
    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection $manifestsCollection
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Taxonomy
     */
    public function createTaxonomy(ManifestsCollection $manifestsCollection)
    {
        $blocks = new BlockTypesCollection();
        $groups = new GroupTypesCollection();
        $allTypes = new TypesCollection();
        $familyTypes = [];

        $inc_names = [];

        foreach($manifestsCollection as $manifest)
        {
            $name = $manifest->getName();
            $family = $manifest->getFamily();
            $mode = $manifest->getMode();
            $rank = $manifest->getRank();

            if($mode === TypeMode::MODE_A and $rank === TypeRank::BLOCK)
            {
                $type = new BlockType($name, $family);
                $blocks->addType($type);
                $allTypes->addType($type);
            }
            elseif($mode === TypeMode::MODE_A and $rank === TypeRank::GROUP)
            {
                $type = new GroupType($name, $family);
                $groups->addType($type);
                $allTypes->addType($type);
            }
            elseif($mode === TypeMode::MODE_B)
            {
                $type = new BModeType($name, $family);
                $allTypes->addType($type);
            }
            elseif($mode === TypeMode::MODE_C)
            {
                $type = new CType($name, $family);
                $allTypes->addType($type);
            }
            else
            {
                throw new TaxonomyException('Заявленное в манифесте сочетание ранга TypeRank('.$rank.') и варианта использования TypeMode ('.$mode.') типа '.$manifest->getName().' не соответствует правилам!');
            }

            $this->addToFamily($familyTypes, $type);

            if($mode !== TypeMode::MODE_C)
            {
                $this->addOwns($type, $manifest);
                $this->addRefs($type, $manifest);
            }

            if($rank === TypeRank::OWN)
            {
                $inc_names[$name] = $this->getIncNames($manifest);
            }
        }

        $this->addIncludedFields($inc_names, $allTypes);
        $this->resolveFields($allTypes);

        $taxonomy = new Taxonomy($blocks, $groups, $allTypes, $familyTypes);

        return $taxonomy;
    }

    private function addToFamily(array & $families, Type $type)
    {
        $family = $type->getFamily();

        if(!array_key_exists($family, $families))
        {
            $families[$family] = new TypesCollection();
        }

        $families[$family]->addType($type);
    }

    private function resolveFields(TypesCollection $collection)
    {
        //Установка типов полей агрегатных типов
        foreach($collection as $type)
        {
            if($type->getMode() !== TypeMode::MODE_C)
            {
                foreach($type->getFields() as $field)
                {
                    $fieldType = $collection->getType($field->getFieldTypeName());
                    $field->setFieldType($fieldType);

                    if($field instanceof RefFieldInterface)
                    {
                        $fieldType->addSub($field);
                    }
                    elseif($field instanceof OwnFieldInterface)
                    {
                       $fieldType->setUsing($type);
                    }
                }
            }
        }
    }

    private function addIncludedFields(array $inc_names, TypesCollection $collection)
    {
        //Добавление внешне-добавляемых имен
        //inc_names: имя типа поля => [имя типа хозяина => [имена полей]]
        foreach($inc_names as $type_name => $owners)
        {
            foreach($owners as $owner_name => $field_names)
            {
                foreach($field_names as $field_name)
                {
                    $ownerType = $collection->getType($owner_name);

                    if($ownerType->getMode() === TypeMode::MODE_A)
                    {
                        $field = new OwnField($ownerType, $field_name, $type_name);
                        $ownerType->addOwn($field);
                    }
                }
            }
        }
    }

    private function getIncNames(Own $manifest)
    {
        $inc_array = [];

        foreach($manifest->toOwnTypes() as $type_name)
        {
            $inc_array[$type_name] = $manifest->includedNames();
        }

        return $inc_array;
    }

    private function addOwns(AggrType $type, Aggregate $manifest)
    {
        $owns = $manifest->getOwns();

        foreach($owns as $field_name => $type_name)
        {
            $field = new OwnField($type, $field_name, $type_name);
            $type->addOwn($field);
        }
    }

    private function addRefs(AggrType $type, Aggregate $manifest)
    {
        $refs = $manifest->getRefs();

        foreach($refs as $field_name => $type_name)
        {
            $field = new RefField($type, $field_name, $type_name);
            $type->addRef($field);
        }
    }
}
