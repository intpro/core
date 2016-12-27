<?php

namespace Interpro\Core\Taxonomy;

use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Contracts\Taxonomy\TypesForecastList as TypesForecastListInterface;

class TypesForecastList implements TypesForecastListInterface
{
    private $Atypes;
    private $Btypes;
    private $Ctypes;

    public function __construct()
    {
        $this->Atypes = [];
        $this->Btypes = [];
        $this->Ctypes = [];
    }

    /**
     * Добавление имени типа А
     *
     * @param string $typeName
     *
     * @return void
     */
    public function registerATypeName($typeName)
    {
        if(is_string($typeName))
        {
            $this->Atypes[] = $typeName;
        }
        else
        {
            throw new TaxonomyException('Имя типа должно быть задано строкой!');
        }
    }

    /**
     * Добавление имени типа B
     *
     * @param string $typeName
     *
     * @return void
     */
    public function registerBTypeName($typeName)
    {
        if(is_string($typeName))
        {
            $this->Btypes[] = $typeName;
        }
        else
        {
            throw new TaxonomyException('Имя типа должно быть задано строкой!');
        }
    }

    /**
     * Добавление имени типа C
     *
     * @param string $typeName
     *
     * @return void
     */
    public function registerCTypeName($typeName)
    {
        if(is_string($typeName))
        {
            $this->Ctypes[] = $typeName;
        }
        else
        {
            throw new TaxonomyException('Имя типа должно быть задано строкой!');
        }
    }


    /**
     * Добавление имени типа А
     *
     * @param string $typeName
     *
     * @return array
     */
    public function getATypeNames()
    {
        return $this->Atypes;
    }

    /**
     * Добавление имени типа B
     *
     * @param string $typeName
     *
     * @return array
     */
    public function getBTypeNames()
    {
        return $this->Btypes;
    }

    /**
     * Добавление имени типа C
     *
     * @param string $typeName
     *
     * @return array
     */
    public function getCTypeNames()
    {
        return $this->Ctypes;
    }

}
