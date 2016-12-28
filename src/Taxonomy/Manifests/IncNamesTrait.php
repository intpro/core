<?php

namespace Interpro\Core\Taxonomy\Manifests;

trait IncNamesTrait
{
    private $names;
    private $owners;

    protected function setIncNames($names, $owners, callable $checkName)
    {
        foreach($names as $field_name)
        {
            $checkName($field_name, 'Имя включаемого поля');
        }
        $this->names = $names;

        foreach($owners as $owner_name)
        {
            $checkName($owner_name, 'Имя типа владельца для включения поля');
        }
        $this->owners = $owners;
    }

    /**
     * @return array
     */
    public function includedNames()
    {
        return $this->names;
    }

    /**
     * @return array
     */
    public function toOwnTypes()
    {
        return $this->owners;
    }
}
