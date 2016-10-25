<?php

namespace Interpro\Core\Taxonomy\Manifests;

use Interpro\Core\Contracts\Taxonomy\Manifest\Aggregate;
use Interpro\Core\Contracts\Taxonomy\Manifest\Own;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;

class BTypeManifest extends TypeManifest implements Aggregate, Own
{
    use FieldsTrait;
    use IncNamesTrait;

    /**
     * @return void
     */
    public function __construct($family, $name, array $owns = [], array $refs = [], array $names = [], array $owners = [])
    {
        parent::__construct($family, $name);

        $this->setFields($owns, $refs, array($this, 'checkName'));
        $this->setIncNames($names, $owners, array($this, 'checkName'));
        $this->setMode(TypeMode::MODE_B);
        $this->setRank(TypeRank::OWN);
    }

}
