<?php

namespace Interpro\Core\Contracts\Taxonomy\Types;

interface OwnType extends Type
{
    /**
     * @return string
     */
    public function getUsing();
}
