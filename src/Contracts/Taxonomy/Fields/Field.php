<?php

namespace Interpro\Core\Contracts\Taxonomy\Fields;

use Interpro\Core\Contracts\Named;

interface Field extends Named
{
    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AggrType
     */
    public function getOwnerType();

    /**
     * @return string
     */
    public function getFieldTypeName();

    /**
     * @return string
     */
    public function getOwnerTypeName();

    /**
     * @return string
     */
    public function getFieldTypeFamily();

    /**
     * @return string
     */
    public function getRank();

    /**
     * @return int
     */
    public function getMode();
}
