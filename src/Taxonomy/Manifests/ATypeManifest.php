<?php

namespace Interpro\Core\Taxonomy\Manifests;

use Interpro\Core\Contracts\Taxonomy\Manifest\Aggregate;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class ATypeManifest extends TypeManifest implements Aggregate
{
    use FieldsTrait;

    /**
     * @return void
     */
    public function __construct($family, $name, $rank, array $owns = [], array $refs = [])
    {
        parent::__construct($family, $name);

        if($rank === TypeRank::GROUP)
        {
            if(!array_key_exists('block_name', $refs))
            {
                throw new TaxonomyException('При создании типа группы ('.$name.') необходимо указать имя блока в ссылках!');
            }

            if(!array_key_exists('superior', $refs))
            {
                $refs['superior'] = $refs['block_name'];
            }
        }

        $this->setRank($rank);
        $this->setFields($owns, $refs, array($this, 'checkName'));
        $this->setMode(TypeMode::MODE_A);
    }
}
