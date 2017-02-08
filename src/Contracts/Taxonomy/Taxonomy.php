<?php

namespace Interpro\Core\Contracts\Taxonomy;

interface Taxonomy
{
    /**
     * @return \Interpro\Core\Taxonomy\Collections\BlockTypesCollection
     */
    public function getBlocks();

    /**
     * @return \Interpro\Core\Taxonomy\Collections\GroupTypesCollection
     */
    public function getGroups();

    /**
     * @return \Interpro\Core\Taxonomy\Types\BlockType
     */
    public function getBlock($name);

    /**
     * @return \Interpro\Core\Taxonomy\Types\GroupType
     */
    public function getGroup($name);

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getType($name);

    /**
     * @return bool
     */
    public function exist($name);

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Taxonomy\Collections\TypesCollection
     */
    public function getFamily($family);
}
