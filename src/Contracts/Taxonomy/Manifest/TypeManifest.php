<?php

namespace Interpro\Core\Contracts\Taxonomy\Manifest;

use Interpro\Core\Contracts\Mediatable;
use Interpro\Core\Contracts\Named;

interface TypeManifest extends Named, Mediatable
{
    /**
     * @return string
     */
    public function getMode();

    /**
     * @return string
     */
    public function getRank();
}
