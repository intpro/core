<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Contracts\Taxonomy\Types\ScalarType as ScalarTypeInterface;

class ScalarType extends ProType implements ScalarTypeInterface
{
    public function getMode()
    {
        return TypeMode::MODE_C;
    }

    public function getRank()
    {
        return TypeRank::OWN;
    }
}
