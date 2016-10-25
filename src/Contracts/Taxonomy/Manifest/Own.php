<?php

namespace Interpro\Core\Contracts\Taxonomy\Manifest;

interface Own
{
    /**
     * @return array
     */
    public function includedNames();

    /**
     * @return array
     */
    public function toOwnTypes();
}
