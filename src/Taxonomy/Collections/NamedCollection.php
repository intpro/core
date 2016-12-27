<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Named;
use Interpro\Core\Contracts\Collection;
use Interpro\Core\Exception\CollectionException;

class NamedCollection implements Collection
{
    protected $items = [];
    protected $item_names = [];
    private $position = 0;

    public function first()
    {
        if(count($this->item_names) !== 0)
        {
            $name = $this->item_names[0];
            return $this->items[$name];
        }
        else
        {
            return null;
        }
    }

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

        $this->notFoundAction($name);
    }

    protected function addByName(Named $item)
    {
        $key = $item->getName();

        if(!in_array($key, $this->item_names))
        {
            $this->item_names[] = $key;
        }

        $this->items[$key] = $item;
    }

    protected function notFoundAction($name)
    {
        throw new CollectionException('Элемент коллекции не найден по имени '.$name.'!');
    }
}
