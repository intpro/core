<?php

namespace Interpro\Core\Contracts\Taxonomy\Fields;

interface RefField extends Field
{
    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getFieldType();
}
