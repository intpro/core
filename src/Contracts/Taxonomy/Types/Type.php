<?php

namespace Interpro\Core\Contracts\Taxonomy\Types;

use Interpro\Core\Contracts\Named;

interface Type extends Named
{
    /**
     * @return string
     */
    public function getMode();

    /**
     * @return string
     */
    public function getRank();

    /**
     * @return string
     */
    public function getFamily();
}
