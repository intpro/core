<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection as ManifestsCollectionInterface;

class ManifestsCollection extends NamedCollection implements ManifestsCollectionInterface
{
    /**
     * @param \Interpro\Core\Contracts\Taxonomy\TypeManifest
     */
    public function addManifest(TypeManifest $manifest)
    {
        $this->addByName($manifest);
    }

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest
     */
    public function getManifest($name)
    {
        return parent::getByName($name);
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найден манифест типа по имени '.$name.'!');
    }
}
