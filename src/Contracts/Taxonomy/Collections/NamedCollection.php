<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Collection;

interface NamedCollection extends Collection
{
    /**
     * @param $name
     *
     * @return bool
     */
    public function exist($name);
}
