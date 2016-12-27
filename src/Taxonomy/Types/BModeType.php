<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Contracts\Taxonomy\Types\AggrType as AggrTypeInterface;
use Interpro\Core\Contracts\Taxonomy\Types\BType;
use Interpro\Core\Taxonomy\Collections\AggrTypesCollection;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;

class BModeType extends AggrType implements BType
{
    private $using;

    /**
     * @param string $name
     * @param string $family
     *
     * @return void
     */
    public function __construct($name, $family)
    {
        parent::__construct($name, $family);

        $this->initCollections();
    }

    protected function initCollections()
    {
        parent::initCollections();
        $this->using = new AggrTypesCollection();
    }

    public function getMode()
    {
        return TypeMode::MODE_B;
    }

    public function getRank()
    {
        return TypeRank::OWN;
    }

    public function getUsing()
    {
        return $this->using;
    }

    public function setUsing(AggrTypeInterface $type)
    {
        $this->using->addType($type);
    }
}
