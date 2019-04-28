<?php

namespace Interpro\Core\Test;

use Interpro\Core\Taxonomy\Fields\OwnField;
use Interpro\Core\Taxonomy\Fields\RefField;
use Interpro\Core\Taxonomy\Types\BlockType;
use Interpro\Core\Taxonomy\Types\BModeType;
use Interpro\Core\Taxonomy\Types\GroupType;
use Interpro\Core\Taxonomy\Types\CType;

class FieldTest extends \PHPUnit\Framework\TestCase
{
    public function setUp(): void
    {
        $this->aggrA1 = new BlockType('block1', 'qsfamily');
        $this->aggrA2 = new GroupType('group1', 'qsfamily');
        $this->aggrA3 = new GroupType('otherAtype', 'otherfamily');
        $this->aggrB1 = new BModeType('image', 'imagearg');
        $this->aggrB2 = new BModeType('crop', 'imagearg');
        $this->aggrB3 = new BModeType('money', 'cash');
        $this->typeC = new CType('int', 'scalar');

        $this->AOwnField1 = new OwnField($this->aggrA2, 'own1', 'image');
        $this->AOwnField2 = new OwnField($this->aggrA2, 'own2', 'int');
        $this->BOwnField1 = new OwnField($this->aggrB1, 'own1', 'int');
        $this->BOwnField2 = new OwnField($this->aggrB1, 'own2', 'crop');

        $this->ARefField1 = new RefField($this->aggrA2, 'ref1', 'block1');
        $this->ARefField2 = new RefField($this->aggrA2, 'ref2', 'otherAtype');
        $this->BRefField = new RefField($this->aggrB1, 'ref1', 'crop');

        //-------------------

        $this->AWrongOwnField = new OwnField($this->aggrA1, 'own3', 'group1');
        $this->BWrongOwnField1 = new OwnField($this->aggrB1, 'own3', 'group1');
        $this->BWrongOwnField2 = new OwnField($this->aggrB1, 'own4', 'money');

        $this->BWrongRefField1 = new RefField($this->aggrB1, 'ref3', 'money');
        $this->BWrongRefField2 = new RefField($this->aggrB1, 'ref4', 'group1');

    }

    public function testOwn()
    {
        $this->AOwnField1->setFieldType($this->aggrB1);
        $this->AOwnField2->setFieldType($this->typeC);
        $this->BOwnField1->setFieldType($this->typeC);
        $this->BOwnField2->setFieldType($this->aggrB2);

        $this->assertEquals($this->aggrB1, $this->AOwnField1->getFieldType());
        $this->assertEquals($this->typeC, $this->BOwnField1->getFieldType());
        $this->assertEquals($this->aggrB2, $this->BOwnField2->getFieldType());
    }

    public function testRef()
    {
        $this->ARefField1->setFieldType($this->aggrA1);
        $this->ARefField2->setFieldType($this->aggrA3);
        $this->BRefField->setFieldType($this->aggrB2);

        $this->assertEquals($this->aggrA1, $this->ARefField1->getFieldType());
        $this->assertEquals($this->aggrA3, $this->ARefField2->getFieldType());
        $this->assertEquals($this->aggrB2, $this->BRefField->getFieldType());
    }

    /**
     * @expectedException \Interpro\Core\Taxonomy\Exception\TaxonomyException
     */
    public function testWrongOwnAA()
    {
        $this->AWrongOwnField->setFieldType($this->aggrA2);
    }

    /**
     * @expectedException \Interpro\Core\Taxonomy\Exception\TaxonomyException
     */
    public function testWrongOwnBA()
    {
        $this->BWrongOwnField1->setFieldType($this->aggrA2);
    }

    /**
     * @expectedException \Interpro\Core\Taxonomy\Exception\TaxonomyException
     */
    public function testWrongOwnBB()
    {
        $this->BWrongOwnField2->setFieldType($this->aggrB3);
    }

    /**
     * @expectedException \Interpro\Core\Taxonomy\Exception\TaxonomyException
     */
    public function testWrongRefBB()
    {
        $this->BWrongRefField1->setFieldType($this->aggrB3);
    }

    /**
     * @expectedException \Interpro\Core\Taxonomy\Exception\TaxonomyException
     */
    public function testWrongRefBA()
    {
        $this->BWrongRefField2->setFieldType($this->aggrA2);
    }

}
