<?php

namespace Interpro\Core\Contracts\Ref;

interface ARef
{
    /**
     * @return \Interpro\Core\Contracts\Taxonomy\Types\AType
     */
    public function getType();

    /**
     * @return string
     */
    public function getFamily();

    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function __toString();
}
