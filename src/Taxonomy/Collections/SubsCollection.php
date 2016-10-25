<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Collection;
use Interpro\Core\Taxonomy\Fields\RefField;

class SubsCollection implements Collection
{
    protected $refs = [];
    private $named_collections = [];
    private $position = 0;

    /**
     * @param \Interpro\Core\Taxonomy\Fields\RefField
     */
    public function addRef(RefField $field)
    {
        $this->refs[$field->getName()] = $field;
    }

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\AggrTypesCollection
     */
    public function filterByFieldName($name)
    {
        if(!array_key_exists($name, $this->named_collections))
        {
            $collection = new AggrTypesCollection();

            foreach($this as $ref)
            {
                if($ref->getName() === $name or $name === 'all')
                {
                    $type = $ref->getFieldType();
                    if(!$collection->exist($type->getName()))
                    {
                        $collection->addType($type);
                    }
                }
            }

            $this->named_collections[$name] = $collection;
        }

        return $this->named_collections[$name];
    }

    function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return \Interpro\Core\Contracts\Named
     */
    function current()
    {
        return $this->refs[$this->position];
    }

    function key()
    {
        return $this->position;
    }

    function next()
    {
        ++$this->position;
    }

    function valid()
    {
        return isset($this->refs[$this->position]);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->refs);
    }

}
