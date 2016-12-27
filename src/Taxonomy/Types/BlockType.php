<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Taxonomy\Collections\GroupTypesCollection;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Contracts\Taxonomy\Types\BlockType as BlockTypeInterface;

class BlockType extends AggrType implements BlockTypeInterface
{
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
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupType($group_name)
    {
        $groupType = $this->getGroups()->getSub($group_name);

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
        $groupType = $this->getGroupsFlat()->getSub($group_name);

        return $groupType;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getGroups()
    {
        return $this->getSubs('superior');
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getGroupsFlat()
    {
        return $this->getSubs('block_name');
    }
}
