<?php

namespace Interpro\Core\Contracts\Taxonomy\Fields;

interface OwnField extends Field
{
    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\OwnType
     */
    public function getFieldType();
}
