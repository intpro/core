<?php

namespace Interpro\Core\Contracts\Taxonomy\Manifest;

interface Aggregate
{
    /**
     * @return array
     */
    public function getOwns();

    /**
     * @return array
     */
    public function getRefs();
}
