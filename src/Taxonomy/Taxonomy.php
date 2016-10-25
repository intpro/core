<?php

namespace Interpro\Core\Taxonomy;

use Interpro\Core\Contracts\Taxonomy\Taxonomy as TaxonomyInterface;
use Interpro\Core\Contracts\Taxonomy\Collections\BlockTypesCollection as BlockTypesCollectionInterface;
use Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection as GroupTypesCollectionInterface;
use Interpro\Core\Contracts\Taxonomy\Collections\TypesCollection as TypesCollectionInterface;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class Taxonomy implements TaxonomyInterface
{
    private $blocks;
    private $groups;
    private $allTypes;
    private $familyTypes = [];

    /**
     * @return void
     */
    public function __construct(BlockTypesCollectionInterface $blockTypesCollection, GroupTypesCollectionInterface $groupTypesCollection, TypesCollectionInterface $typesCollection, array $familyTypes)
    {
        $this->blocks      = $blockTypesCollection;
        $this->groups      = $groupTypesCollection;
        $this->allTypes    = $typesCollection;
        $this->familyTypes = $familyTypes;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\BlockTypesCollection
     */
    public function getBlocks()
    {
        return $this->blocks;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     */
    public function getBlock($name)
    {
        return $this->blocks->getType($name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function getGroup($name)
    {
        return $this->groups->getType($name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getType($name)
    {
        return $this->allTypes->getType($name);
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Taxonomy\Collections\TypesCollection
     */
    public function getFamily($family)
    {
        if(array_key_exists($family, $this->familyTypes))
        {
            return $this->familyTypes[$family];
        }
        else
        {
            throw new TaxonomyException('Не найдена коллекция типов пакета '.$family);
        }
    }
}
