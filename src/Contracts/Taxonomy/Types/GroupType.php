<?php

namespace Interpro\Core\Contracts\Taxonomy\Types;

interface GroupType extends AggrType
{
    /**
     * @param string $group_name
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     */
    public function getSubGroupType($group_name, $ref_name = 'superior');

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection
     *
     */
    public function getGroups($ref_name = 'superior');

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getSuperior($ref_name = 'superior');

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\BlockType
     *
     */
    public function getBlock($ref_name = 'block_name');
}
