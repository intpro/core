<?php

namespace Interpro\Core\Taxonomy;

use Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest;
use Interpro\Core\Contracts\Taxonomy\TypeRegistrator as TypeRegistratorInterface;
use Interpro\Core\Taxonomy\Collections\ManifestsCollection;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

class TypeRegistrator implements TypeRegistratorInterface
{
    private $collection;

    /**
     * @return void
     */
    public function __construct()
    {
        $this->collection = new ManifestsCollection();
    }

    /**
     * @return void
     */
    public function registerType(TypeManifest $manifest)
    {
        if($this->collection->exist($manifest->getName()))
        {
            throw new TaxonomyException('Попытка повторной регистрации типа '.$manifest->getName().'!');
        }

        $mode = $manifest->getMode();
        $rank = $manifest->getRank();

        if(!(($mode === TypeMode::MODE_A and $rank === TypeRank::BLOCK) or
            ($mode === TypeMode::MODE_A and $rank === TypeRank::GROUP) or
            ($mode === TypeMode::MODE_B and $rank === TypeRank::OWN) or
            ($mode === TypeMode::MODE_C and $rank === TypeRank::OWN)))
        {
            throw new TaxonomyException('В регистрации типа '.$manifest->getName().' отказано! Сочетание ранга TypeRank('.$rank.') и варианта использования TypeMode ('.$mode.') типа не соответствует правилам!');
        }

        $this->collection->addManifest($manifest);
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
