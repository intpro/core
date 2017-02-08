<?php

namespace Interpro\Core\Iterator;

use Interpro\Core\Contracts\Iterator;
use Interpro\Core\Enum\OddEven;

class OddEvenIterator implements Iterator
{
    protected $refs = [];
    private $position = 0;
    private $oddeven = 'ODD';

    public function __construct(array & $refs, $oddeven = 'ODD')
    {
        $this->refs = $refs;
        $this->oddeven = $oddeven;
    }

    public function first()
    {
        if($this->oddeven === OddEven::ODD)
        {
            $index = 0;
        }
        else
        {
            $index = 1;
        }

        if(count($this->refs) >= ($index+1))
        {
            return $this->refs[$index];
        }
        else
        {
            return null;
        }
    }

    function rewind()
    {
        if($this->oddeven === OddEven::EVEN)
        {
            if($this->position === 0)
            {
                $this->position = 1;
            }
        }
        else
        {
            $this->position = 0;
        }
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
        $this->position += 2;
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
