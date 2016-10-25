<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Taxonomy\Collections\GroupTypesCollection;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Contracts\Taxonomy\Types\BlockType as BlockTypeInterface;

class BlockType extends AggrType implements BlockTypeInterface
{
    private $topLevelGroups = [];

    /**
     * @return int
     */
    public function getMode()
    {
        return TypeMode::MODE_A;
    }

    /**
     * @return string
     */
    public function getRank()
    {
        return TypeRank::BLOCK;
    }

    /**
     * @param string $group_name
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupType($group_name, $ref_name = 'superior')
    {
        $groupType = $this->getGroups($ref_name)->getType($group_name);

        return $groupType;
    }

    /**
     * @param string $group_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupTypeFlat($group_name)
    {
        $types = $this->getSubs('block_name');

        return $types->getType($group_name);
    }

    /**
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection
     */
    public function getGroups($ref_name = 'superior')
    {
        if(array_key_exists($ref_name, $this->topLevelGroups))
        {
            $collection = new GroupTypesCollection();

            $types = $this->getSubs('block_name');

            foreach($types as $type)
            {
                if(!$type->refExist($ref_name))
                {
                    $collection->addType($type);
                }
            }

            $this->topLevelGroups[$ref_name] = $collection;
        }

        return $this->topLevelGroups[$ref_name];
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\TypesCollection
     */
    public function getGroupsFlat()
    {
        return $this->getSubs('block_name');
    }
}
