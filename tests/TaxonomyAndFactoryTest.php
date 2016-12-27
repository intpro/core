<?php

namespace Interpro\Core\Test;

class TaxonomyAndFactoryTest extends \PHPUnit_Framework_TestCase
{
    private $taxonomyFactory;

    public function setUp()
    {
        $this->taxonomyFactory = new \Interpro\Core\Taxonomy\Factory\TaxonomyFactory();
    }

    public function testCreateTaxonomy()
    {
        $family = 'qs';
        $name = 'block1';
        $owns = ['own1'=>'string', 'own2'=>'int'];
        $refs = ['ref1'=>'group1', 'ref2'=>'group2'];
        $manA1 = new \Interpro\Core\Taxonomy\Manifests\ATypeManifest($family, $name, \Interpro\Core\Taxonomy\Enum\TypeRank::BLOCK, $owns, $refs);

        $family = 'qs';
        $name = 'group1';
        $owns = ['own1'=>'string', 'own2'=>'int'];
        $refs = ['block_name'=>'block1'];
        $manA2 = new \Interpro\Core\Taxonomy\Manifests\ATypeManifest($family, $name, \Interpro\Core\Taxonomy\Enum\TypeRank::GROUP, $owns, $refs);

        $family = 'qs';
        $name = 'group2';
        $owns = ['own1'=>'string', 'own2'=>'int', 'picture'=>'image'];
        $refs = ['superior'=>'group1', 'block_name'=>'block1'];
        $manA3 = new \Interpro\Core\Taxonomy\Manifests\ATypeManifest($family, $name, \Interpro\Core\Taxonomy\Enum\TypeRank::GROUP, $owns, $refs);

        $family = 'image_types';
        $name = 'image';
        $owns = ['name'=>'string', 'link'=>'string'];
        $manB1 = new \Interpro\Core\Taxonomy\Manifests\BTypeManifest($family, $name, $owns);

        $family = 'scalar';
        $name = 'string';
        $manC1 = new \Interpro\Core\Taxonomy\Manifests\CTypeManifest($family, $name, [], []);

        $family = 'scalar';
        $name = 'int';
        $manC2 = new \Interpro\Core\Taxonomy\Manifests\CTypeManifest($family, $name, [], []);

        $manifestsCollection = new \Interpro\Core\Taxonomy\Collections\ManifestsCollection();
        $manifestsCollection->addManifest($manA1);
        $manifestsCollection->addManifest($manA2);
        $manifestsCollection->addManifest($manA3);
        $manifestsCollection->addManifest($manB1);
        $manifestsCollection->addManifest($manC1);
        $manifestsCollection->addManifest($manC2);

        $taxonomy = $this->taxonomyFactory->createTaxonomy($manifestsCollection);

        $blocks = $taxonomy->getBlocks();
        $groups = $taxonomy->getGroups();
        $block1 = $taxonomy->getType('block1');
        $group1 = $taxonomy->getType('group1');
        $group2 = $taxonomy->getType('group2');
        $image = $taxonomy->getType('image');
        $scalarInt = $taxonomy->getType('int');
        $scalarString = $taxonomy->getType('string');

        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Taxonomy', $taxonomy, 'интерфейс таксономии');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Collections\BlockTypesCollection', $blocks, 'интерфейс коллекции блоков');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Collections\GroupTypesCollection', $groups, 'интерфейс коллекции групп');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Types\BlockType', $block1, 'интерфейс коллекции блоков');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Types\GroupType', $group1, 'интерфейс коллекции групп');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Types\GroupType', $group2, 'интерфейс коллекции групп');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Types\AggrType', $image, 'интерфейс image');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Types\CType', $scalarInt, 'интерфейс int');
        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Types\CType', $scalarString, 'интерфейс string');

        $this->assertCount(1, $blocks, 'в коллекции 1 тип блока');
        $this->assertCount(2, $groups, 'в коллекции 2 типа группы');
        $this->assertCount(2, $groups, 'в коллекции 2 типа группы');
    }
}
