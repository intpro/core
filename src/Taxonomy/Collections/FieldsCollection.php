<?php

namespace Interpro\Core\Taxonomy\Collections;

use Interpro\Core\Contracts\Taxonomy\Fields\Field;
use Interpro\Core\Taxonomy\Exception\TaxonomyException;
use Interpro\Core\Contracts\Taxonomy\Collections\FieldsCollection as FieldsCollectionInterface;

class FieldsCollection extends NamedCollection implements FieldsCollectionInterface
{
    protected $typed_collections = [];

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Fields\Field
     */
    public function getField($name)
    {
        return $this->getByName($name);
    }

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Types\Type
     */
    public function getFieldType($name)
    {
        return $this->getField($name)->getFieldType();
    }

    /**
     * @param \Interpro\Core\Contracts\Taxonomy\Fields\Field
     */
    public function addField(Field $field)
    {
        $this->addByName($field);
    }

    /**
     * @param string $name
     *
     * @return \Interpro\Core\Contracts\Taxonomy\Collections\FieldsCollection
     */
    public function getTyped($name)
    {
        if(!array_key_exists($name, $this->typed_collections))
        {
            $collection = new FieldsCollection();

            foreach($this as $field)
            {
                if($field->getFieldType()->getName() === $name)
                {
                    $collection->addField($field);
                }
            }

            $this->typed_collections[$name] = $collection;
        }

        return $this->typed_collections[$name];
    }

    protected function notFoundAction($name)
    {
        throw new TaxonomyException('Не найдено поле по имени '.$name.'!');
    }

}
