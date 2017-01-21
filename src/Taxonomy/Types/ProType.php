<?php

namespace Interpro\Core\Taxonomy\Types;

use Interpro\Core\Contracts\Taxonomy\Types\Type as TypeInterface;

abstract class ProType implements TypeInterface
{
    private $name;
    private $family;

    /**
     * @param string $name
     * @param string $family
     *
     * @return void
     */
    public function __construct($name, $family)
    {
        $this->name = $name;
        $this->family = $family;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getFamily()
    {
        return $this->family;
    }

    /**
     * @return string
     */
    abstract public function getMode();

    /**
     * @return string
     */
    abstract function getRank();

    /**
     * @param string $req_name
     *
     * @return mixed
     */
    public function __get($req_name)
    {
        if($req_name === 'mode')
        {
            return $this->getMode();
        }
        elseif($req_name === 'name')
        {
            return $this->getName();
        }
        elseif($req_name === 'rank')
        {
            return $this->getRank();
        }
        elseif($req_name === 'family')
        {
            return $this->getFamily();
        }
        else
        {
            return null;
        }
    }
}
