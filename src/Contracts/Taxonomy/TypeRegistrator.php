<?php

namespace Interpro\Core\Contracts\Taxonomy;

use Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest;

interface TypeRegistrator
{
    /**
     * @return void
     */
    public function registerType(TypeManifest $manifest);

    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection
     */
    public function getCollection();
}
