<?php

namespace Interpro\Core\Test;

class TypeManifestTest extends \PHPUnit\Framework\TestCase
{
    //Не полный, еще обработать исключения

    public function testATypeManifest()
    {
        $family = 'qs';
        $name = 'block1';

        $owns = ['own1'=>'string', 'own2'=>'int'];
        $refs = ['ref1'=>'group1', 'ref2'=>'group2'];

        $manA = new \Interpro\Core\Taxonomy\Manifests\ATypeManifest($family, $name, \Interpro\Core\Taxonomy\Enum\TypeRank::BLOCK, $owns, $refs);

        $this->assertEquals($manA->getFamily(), $family, 'имя пакета');
        $this->assertEquals($manA->getName(), $name, 'имя типа');

        $this->assertEquals($manA->getMode(), \Interpro\Core\Taxonomy\Enum\TypeMode::MODE_A, 'вариант использования');
        $this->assertEquals($manA->getRank(), \Interpro\Core\Taxonomy\Enum\TypeRank::BLOCK, 'ранг');

        $this->assertEquals($manA->getOwns(), $owns, 'собственные поля');
        $this->assertEquals($manA->getRefs(), $refs, 'ссылки');
    }

    public function testBTypeManifest()
    {
        $family = 'qs';
        $name = 'block1';

        $owns = ['own1'=>'string', 'own2'=>'int'];
        $refs = ['ref1'=>'group1', 'ref2'=>'group2'];

        $fields = ['extname1', 'extname2'];
        $owners = ['ref1'=>'group1', 'ref2'=>'group2'];

        $manB = new \Interpro\Core\Taxonomy\Manifests\BTypeManifest($family, $name, $owns, $refs, $fields, $owners);

        $this->assertEquals($manB->getFamily(), $family, 'имя пакета');
        $this->assertEquals($manB->getName(), $name, 'имя типа');

        $this->assertEquals($manB->getMode(), \Interpro\Core\Taxonomy\Enum\TypeMode::MODE_B, 'вариант использования');
        $this->assertEquals($manB->getRank(), \Interpro\Core\Taxonomy\Enum\TypeRank::OWN, 'ранг');

        $this->assertEquals($manB->getOwns(), $owns, 'собственные поля');
        $this->assertEquals($manB->getRefs(), $refs, 'ссылки');

        $this->assertEquals($manB->includedNames(), $fields, 'поля включения');
        $this->assertEquals($manB->toOwnTypes(), $owners, 'имена владельцев');
    }

    public function testCTypeManifest()
    {
        $family = 'qs';
        $name = 'block1';

        $fields = ['extname1', 'extname2'];
        $owners = ['ref1'=>'group1', 'ref2'=>'group2'];

        $manC = new \Interpro\Core\Taxonomy\Manifests\CTypeManifest($family, $name, $fields, $owners);

        $this->assertEquals($manC->getFamily(), $family, 'имя пакета');
        $this->assertEquals($manC->getName(), $name, 'имя типа');

        $this->assertEquals($manC->getMode(), \Interpro\Core\Taxonomy\Enum\TypeMode::MODE_C, 'вариант использования');
        $this->assertEquals($manC->getRank(), \Interpro\Core\Taxonomy\Enum\TypeRank::OWN, 'ранг');

        $this->assertEquals($manC->includedNames(), $fields, 'поля включения');
        $this->assertEquals($manC->toOwnTypes(), $owners, 'имена владельцев');
    }

}
