<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Named;
use Interpro\Core\Contracts\Taxonomy\Fields\RefField;

interface SubsCollection extends NamedCollection, Named
{
    /**
     * @return bool
     */
    public function cap();

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Fields\RefField
     *
     * @return void
     */
    public function addByRef(RefField $ref);

    /**
     * @param string $ref_owner_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getSub($ref_owner_name);

    /**
     * @return array
     */
    public function getSubNames();
}
