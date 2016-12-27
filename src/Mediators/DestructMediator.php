<?php

namespace Interpro\Core\Mediators;

use Interpro\Core\Contracts\Executor\ADestructor;
use Interpro\Core\Contracts\Executor\BDestructor;
use Interpro\Core\Contracts\Executor\CDestructor;
use Interpro\Core\Contracts\Mediator\DestructMediator as DestructMediatorInterface;
use Interpro\Core\Exception\CoreException;

class DestructMediator implements DestructMediatorInterface
{
    private $destructorsA = [];
    private $destructorsB = [];
    private $destructorsC = [];

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\ADestructor
     */
    public function getADestructor($family)
    {
        if(!array_key_exists($family, $this->destructorsA))
        {
            throw new CoreException('Деструктор агрегатных(A) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->destructorsA[$family];
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\BDestructor
     */
    public function getBDestructor($family)
    {
        if(!array_key_exists($family, $this->destructorsB))
        {
            throw new CoreException('Деструктор агрегатных(B) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->destructorsB[$family];
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\CDestructor
     */
    public function getCDestructor($family)
    {
        if(!array_key_exists($family, $this->destructorsC))
        {
            throw new CoreException('Деструктор простых(C) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->destructorsC[$family];
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\ADestructor
     *
     * @return void
     */
    public function registerADestructor(ADestructor $destructor)
    {
        $family = $destructor->getFamily();

        if(array_key_exists($family, $this->destructorsA))
        {
            throw new CoreException('Деструктор агрегатных(A) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->destructorsA[$family] = $destructor;
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\BDestructor
     *
     * @return void
     */
    public function registerBDestructor(BDestructor $destructor)
    {
        $family = $destructor->getFamily();

        if(array_key_exists($family, $this->destructorsB))
        {
            throw new CoreException('Деструктор агрегатных(B) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->destructorsB[$family] = $destructor;
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\CDestructor
     *
     * @return void
     */
    public function registerCDestructor(CDestructor $destructor)
    {
        $family = $destructor->getFamily();

        if(array_key_exists($family, $this->destructorsC))
        {
            throw new CoreException('Деструктор простых(С) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->destructorsC[$family] = $destructor;
    }

}
