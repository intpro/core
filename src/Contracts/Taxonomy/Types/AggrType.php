<?php

namespace Interpro\Core\Contracts\Taxonomy\Types;

interface AggrType extends Type
{
    /**
     * @return \Interpro\Core\Taxonomy\Collections\FieldsCollection
     */
    public function getOwns($field_type_name = 'all');

    /**
     * @return \Interpro\Core\Taxonomy\Collections\FieldsCollection
     */
    public function getRefs($field_type_name = 'all');

    /**
     * @return \Interpro\Core\Taxonomy\Collections\FieldsCollection
     */
    public function getFields($field_type_name = 'all');

    /**
     * @param string $field_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     *
     */
    public function getFieldType($field_name);

    /**
     * @param string $field_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     *
     */
    public function getField($field_name);

    /**
     * @param string $own_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     *
     */
    public function getOwn($own_name);

    /**
     * @param string $ref_name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     *
     */
    public function getRef($ref_name);

    /**
     * @param string $field_name
     *
     * @return bool
     *
     */
    public function fieldExist($field_name);

    /**
     * @param string $ref_name
     *
     * @return bool
     *
     */
    public function refExist($ref_name);

    /**
     * @param string $own_name
     *
     * @return bool
     *
     */
    public function ownExist($own_name);

}
