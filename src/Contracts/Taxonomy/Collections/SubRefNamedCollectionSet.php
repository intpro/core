<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Fields\RefField;

interface SubRefNamedCollectionSet extends NamedCollection
{
    /**
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\SubsCollection
     */
    public function getSubRefs($ref_name);

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Fields\RefField
     */
    public function addRef(RefField $ref);

    /**
     * @return array
     */
    public function getRefNames();

}
