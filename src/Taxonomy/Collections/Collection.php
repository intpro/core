<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Iterator\FieldIterator;

class Collection implements \Interpro\Core\Contracts\Collection
{
    protected $refs = [];
    private $position = 0;

    public function addRef($item)
    {
        $this->refs[] = $item;
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

    public function sortBy($path)
    {
        return new FieldIterator($this, $path);
    }
}
