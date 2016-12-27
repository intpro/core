<?php

namespace Interpro\Core\Mediators;

use Interpro\Core\Contracts\Executor\AInitializer;
use Interpro\Core\Contracts\Executor\BInitializer;
use Interpro\Core\Contracts\Executor\CInitializer;
use Interpro\Core\Contracts\Mediator\InitMediator as InitMediatorInterface;
use Interpro\Core\Exception\CoreException;

class InitMediator implements InitMediatorInterface
{
    private $initializersA = [];
    private $initializersB = [];
    private $initializersC = [];

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\AInitializer
     */
    public function getAInitializer($family)
    {
        if(!array_key_exists($family, $this->initializersA))
        {
            throw new CoreException('Инициализатор агрегатных(A) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->initializersA[$family];
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\BInitializer
     */
    public function getBInitializer($family)
    {
        if(!array_key_exists($family, $this->initializersB))
        {
            throw new CoreException('Инициализатор агрегатных(B) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->initializersB[$family];
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\CInitializer
     */
    public function getCInitializer($family)
    {
        if(!array_key_exists($family, $this->initializersC))
        {
            throw new CoreException('Инициализатор простых(C) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->initializersC[$family];
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\AInitializer
     *
     * @return void
     */
    public function registerAInitializer(AInitializer $initializer)
    {
        $family = $initializer->getFamily();

        if(array_key_exists($family, $this->initializersA))
        {
            throw new CoreException('Инициализатор агрегатных(A) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->initializersA[$family] = $initializer;
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\BInitializer
     *
     * @return void
     */
    public function registerBInitializer(BInitializer $initializer)
    {
        $family = $initializer->getFamily();

        if(array_key_exists($family, $this->initializersB))
        {
            throw new CoreException('Инициализатор агрегатных(B) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->initializersB[$family] = $initializer;
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\CInitializer
     *
     * @return void
     */
    public function registerCInitializer(CInitializer $initializer)
    {
        $family = $initializer->getFamily();

        if(array_key_exists($family, $this->initializersC))
        {
            throw new CoreException('Инициализатор простых(С) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->initializersC[$family] = $initializer;
    }


}
