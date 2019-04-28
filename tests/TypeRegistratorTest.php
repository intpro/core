<?php

namespace Interpro\Core\Test;

class TypeRegistratorTest extends \PHPUnit\Framework\TestCase
{
    private $registrator;

    public function setUp(): void
    {
        $this->registrator = new \Interpro\Core\Taxonomy\TypeRegistrator();
    }

    public function testInstance()
    {
        $collection = $this->registrator->getCollection();

        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Collections\ManifestsCollection', $collection);

        $this->assertCount(0, $collection);
    }

    public function testRegisterType()
    {
        $family = 'qs';
        $name = 'block1';

        $owns = ['own1'=>'string', 'own2'=>'int'];
        $refs = ['ref1'=>'group1', 'ref2'=>'group2'];

        $manA = new \Interpro\Core\Taxonomy\Manifests\ATypeManifest($family, $name, \Interpro\Core\Taxonomy\Enum\TypeRank::BLOCK, $owns, $refs);

        $this->registrator->registerType($manA);

        $collection = $this->registrator->getCollection();
        $this->assertCount(1, $collection, 'в коллекции 1 тип');

        $this->assertInstanceOf('Interpro\Core\Contracts\Taxonomy\Manifest\TypeManifest', $collection->getManifest($name), 'в коллекции манифест типа А, добавленный выше по имени');
    }

    /**
     * @expectedException \Interpro\Core\Taxonomy\Exception\TaxonomyException
     */
    public function testRegisterWrongType()
    {
        $family = 'qs';
        $name = 'wrong';

        $owns = [];
        $refs = [];

        $manW = new \Interpro\Core\Taxonomy\Manifests\ATypeManifest($family, $name, \Interpro\Core\Taxonomy\Enum\TypeRank::OWN, $owns, $refs);

        $this->registrator->registerType($manW);
    }
}
