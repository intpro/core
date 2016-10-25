<?php

namespace Interpro\Core\Contracts\Taxonomy\Collections;

interface FieldsCollection extends NamedCollection
{
    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     */
    public function getField($name);

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getFieldType($name);

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\FieldsCollection
     */
    public function getTyped($name);

}
