<?php

namespace Interpro\Core\Ref;

use Interpro\Core\Contracts\Ref\ARef as ARefInterface;
use Interpro\Core\Contracts\Taxonomy\Types\AType;

class ARef implements ARefInterface
{
    private $type;
    private $id;

    public function __construct(AType $type, $id = 0)
    {
        $this->type = $type;
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->type->getName().'-'.$this->id;
    }

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getFamily()
    {
        return $this->type->getFamily();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
