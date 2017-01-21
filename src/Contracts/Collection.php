<?php

namespace Interpro\Core\Contracts;

interface Collection extends \Iterator, \Countable
{
    /**
     * @param $path
     * @param string $sort
     *
     * @return \Interpro\Core\Iterator\FieldIterator
     */
    public function sortBy($path, $sort = 'ASC');
}
