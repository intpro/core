<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Named;
use Interpro\Core\Contracts\Collection;

abstract class NamedCollection implements Collection
{
    protected $items = [];
    private $item_names = [];
    private $position = 0;

    function rewind()
    {
        $this->position = 0;
    }

    function current()
    {
        $name = $this->item_names[$this->position];
        return $this->items[$name];
    }

    function key()
    {
        return $this->item_names[$this->position];
    }

    function next()
    {
        ++$this->position;
    }

    function valid()
    {
        return isset($this->item_names[$this->position]);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->item_names);
    }

    public function exist($name)
    {
        return in_array($name, $this->item_names);
    }

    protected function getByName($name)
    {
        if($this->exist($name))
        {
            return $this->items[$name];
        }
        else
        {
            return $this->notFoundAction($name);
        }
    }

    protected function addByName(Named $item)
    {
        $this->item_names[] = $item->getName();
        $this->items[$item->getName()] = $item;
    }

    abstract protected function notFoundAction($name);
}
