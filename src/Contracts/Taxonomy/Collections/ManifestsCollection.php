<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest;

interface ManifestsCollection extends NamedCollection
{
    /**
     * @param \Interpro\Core\Contracts\Taxonomy\TypeManifest
     */
    public function addManifest(TypeManifest $manifest);

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest
     */
    public function getManifest($name);
}
