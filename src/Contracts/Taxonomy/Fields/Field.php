<?php

namespace Interpro\Core\Contracts\Taxonomy\Fields;

use Interpro\Core\Contracts\Named;

interface Field extends Named
{
    public function getOwnerType();

    public function getFieldType();

    public function getFieldTypeName();
}
