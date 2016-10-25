<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Contracts\Taxonomy\Types\BType;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;

class BModeType extends AggrType implements BType
{
    public function getMode()
    {
        return TypeMode::MODE_B;
    }

    public function getRank()
    {
        return TypeRank::OWN;
    }
}
