<?php

namespace Interpro\Core\Contracts\Taxonomy;

interface TypesForecastList
{
    /**
     * Добавление имени типа А
     *
     * @param string $typeName
     *
     * @return void
     */
    public function registerATypeName($typeName);

    /**
     * Добавление имени типа B
     *
     * @param string $typeName
     *
     * @return void
     */
    public function registerBTypeName($typeName);

    /**
     * Добавление имени типа C
     *
     * @param string $typeName
     *
     * @return void
     */
    public function registerCTypeName($typeName);


    /**
     * Добавление имени типа А
     *
     * @param string $typeName
     *
     * @return array
     */
    public function getATypeNames();

    /**
     * Добавление имени типа B
     *
     * @param string $typeName
     *
     * @return array
     */
    public function getBTypeNames();

    /**
     * Добавление имени типа C
     *
     * @param string $typeName
     *
     * @return array
     */
    public function getCTypeNames();

}
