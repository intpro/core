<?php

namespace Interpro\Core\Contracts\Taxonomy\Types;


interface BlockType extends AggrType
{
    /**
     * @param string $group_name
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupType($group_name, $ref_name = 'superior');

    /**
     * @param string $group_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupTypeFlat($group_name);

    /**
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection
     */
    public function getGroups($ref_name = 'superior');

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\TypesCollection
     */
    public function getGroupsFlat();
}
