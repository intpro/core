<?php

namespace Interpro\Core\Taxonomy\Manifests;

trait FieldsTrait
{
    private $owns;
    private $refs;

    protected function setFields($owns, $refs, callable $checkName)
    {
        foreach($owns as $own_name => $own_type_name)
        {
            $checkName($own_name, 'Имя поля');
            $checkName($own_type_name, 'Имя типа поля');
        }
        $this->owns = $owns;

        foreach($refs as $ref_name => $ref_type_name)
        {
            $checkName($ref_name, 'Имя поля');
            $checkName($ref_type_name, 'Имя типа поля');
        }
        $this->refs = $refs;
    }

    /**
     * @return array
     */
    public function getOwns()
    {
        return $this->owns;
    }

    /**
     * @return array
     */
    public function getRefs()
    {
        return $this->refs;
    }
}