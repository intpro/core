<?php

namespace Interpro\Core\Contracts\Taxonomy\Factory;

interface TaxonomyFactory
{
    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection $manifestsCollection
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Taxonomy
     */
    public function createTaxonomy($manifestsCollection);
}
