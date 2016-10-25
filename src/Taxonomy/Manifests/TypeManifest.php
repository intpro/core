<?php

namespace Interpro\Core\Taxonomy\Manifests;

use Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest as TypeManifestInterface;
use Interpro\Core\Taxonomy\Enum\TypeMode;
use Interpro\Core\Taxonomy\Enum\TypeRank;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;

abstract class TypeManifest implements TypeManifestInterface
{
    const NAME_EXP = '/^[a-z][a-z0-9_]+$/';

    private $family;
    private $name;
    private $rank;
    private $mode;

    protected function checkString($value, $message)
    {
        if(!is_string($value))
        {
            throw new TaxonomyException($message.' должно быть задано строкой, передано: '.$value.'!');
        }
    }

    protected function checkName($value, $message)
    {
        $this->checkString($value, $message);

        if(!preg_match(self::NAME_EXP, $value))
        {
            throw new TaxonomyException($message.' должно начинается с символа и содержать только символы латинского алфавита нижнего регистра и цифры, передано: '.$value.'!');
        }
    }

    protected function setMode($mode)
    {
        if(!is_int($mode))
        {
            throw new TaxonomyException('Вариант использования типа должен быть задан целым числом из перечисления TypeMode, передано: '.gettype($mode).'!');
        }

        if(!($mode === TypeMode::MODE_A or $mode === TypeMode::MODE_B or $mode === TypeMode::MODE_C))
        {
            throw new TaxonomyException('Вариант использования типа должен быть задан целым числом из перечисления TypeMode, передано: '.$mode.'!');
        }

        $this->mode = $mode;
    }

    protected function setRank($rank)
    {
        if(!is_string($rank))
        {
            throw new TaxonomyException('Ранг типа должен быть задан строкой, передано: '.gettype($rank).'!');
        }

        if(!($rank === TypeRank::BLOCK or $rank === TypeRank::GROUP or $rank === TypeRank::OWN))
        {
            throw new TaxonomyException('Ранг типа должен быть задан числом, соответствующим значению перечисления (TypeRank) block, group, передано: '.$rank.'!');
        }

        $this->rank = $rank;
    }

    /**
     * @return void
     */
    public function __construct($family, $name)
    {
        $this->checkName($family, 'Значение имени пакета типа');
        $this->checkName($name, 'Значение имени типа');

        $this->family = $family;
        $this->name = $name;
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
    public function getRank()
    {
        return $this->rank;
    }

    /**
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

}
