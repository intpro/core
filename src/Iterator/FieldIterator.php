<?php

namespace Interpro\Core\Iterator;

use Interpro\Core\Contracts\Collection;
use Interpro\Core\Enum\OddEven;
use Interpro\Core\Exception\CollectionException;
use Interpro\Extractor\Contracts\Items\AItem;

class FieldIterator implements \Interpro\Core\Contracts\Iterator
{
    protected $refs = [];
    private $position = 0;

    public function __construct(Collection $collection, $path, $sort = 'ASC')
    {
        $field_array = explode('.', $path);

        $sorter = [];

        foreach($collection as $item)
        {
            $next = $item;

            foreach($field_array as $field_name)
            {
                $next = $next->$field_name;

                if(is_null($next))
                {
                    break;
                }

                if(is_object($next))
                {
                    if($next instanceof AItem)
                    {
                        throw new CollectionException('Cортировка по пути через (А) тип запрещена: '.$path);
                    }
                }
            }

            if(is_object($next))
            {
                throw new CollectionException('Путь сортировки закончился объектом, необходима строка или любой скалярный тип: '.$path);
            }

            $sorter[] = $next;
            $this->refs[] = $item;
        }

        if($sort === 'DESC')
        {
            array_multisort($sorter, SORT_DESC, $this->refs);
        }
        else
        {
            array_multisort($sorter, SORT_ASC, $this->refs);
        }
    }

    public function odd()
    {
        return new OddEvenIterator($this->refs, OddEven::ODD);
    }

    public function even()
    {
        return new OddEvenIterator($this->refs, OddEven::EVEN);
    }

    public function first()
    {
        if(count($this->refs) !== 0)
        {
            return $this->refs[0];
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
