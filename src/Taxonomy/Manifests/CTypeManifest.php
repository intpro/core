<?php

namespace Interpro\Core\Taxonomy\Manifests;

use Interpro\Core\Contracts\Taxonomy\Manifest\Own;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;

class CTypeManifest extends TypeManifest implements Own
{
    use IncNamesTrait;

    /**
     * @return void
     */
    public function __construct($family, $name, array $names = [], array $owners = [])
    {
        parent::__construct($family, $name);

        $this->setIncNames($names, $owners, array($this, 'checkName'));
        $this->setMode(TypeMode::MODE_C);
        $this->setRank(TypeRank::OWN);
    }

}
