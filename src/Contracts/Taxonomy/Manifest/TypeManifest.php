<?php

namespace Interpro\Core\Contracts\Taxonomy\Manifest;

use Interpro\Core\Contracts\Named;

interface TypeManifest extends Named
{
    /**
     * @return string
     */
    public function getFamily();

    /**
     * @return string
     */
    public function getMode();

    /**
     * @return string
     */
    public function getRank();
}
