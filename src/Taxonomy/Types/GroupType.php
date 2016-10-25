<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Contracts\Taxonomy\Types\GroupType as GroupTypeInterface;

class GroupType extends AggrType implements GroupTypeInterface
{
    public function getMode()
    {
        return TypeMode::MODE_A;
    }

    public function getRank()
    {
        return TypeRank::GROUP;
    }

    /**
     * @param string $group_name
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function getSubGroupType($group_name, $ref_name = 'superior')
    {
        $types = $this->getSubs($ref_name);

        return $types->getType($group_name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\TypesCollection
     *
     */
    public function getGroups($ref_name = 'superior')
    {
        return $this->getSubs($ref_name);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getSuperior($ref_name = 'superior')
    {
        return $this->getRef($ref_name)->getFieldType();
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     *
     */
    public function getBlock($ref_name = 'block_name')
    {
        return $this->getRef($ref_name)->getFieldType();
    }
}
