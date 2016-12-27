<?php

namespace Interpro\Core\Contracts\Taxonomy\Types;


interface BlockType extends AType
{
    /**
     * @param string $group_name
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupType($group_name);

    /**
     * @param string $group_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\GroupType
     *
     */
    public function getGroupTypeFlat($group_name);

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getGroups();

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getGroupsFlat();
}
