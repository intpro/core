<?php

namespace Interpro\Core\Taxonomy\Manifests;

use Interpro\Core\Contracts\Taxonomy\Manifest\Aggregate;
use Interpro\Core\Contracts\Taxonomy\Manifest\Rankable;
use Interpro\Core\Taxonomy\Enum\TypeMode;

class ATypeManifest extends TypeManifest implements Aggregate
{
    use FieldsTrait;

    /**
     * @return void
     */
    public function __construct($family, $name, $rank, array $owns = [], array $refs = [])
    {
        parent::__construct($family, $name);

        $this->setRank($rank);
        $this->setFields($owns, $refs, array($this, 'checkName'));
        $this->setMode(TypeMode::MODE_A);
    }
}
