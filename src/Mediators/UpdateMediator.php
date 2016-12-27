<?php

namespace Interpro\Core\Mediators;

use Interpro\Core\Contracts\Executor\AUpdateExecutor;
use Interpro\Core\Contracts\Executor\BUpdateExecutor;
use Interpro\Core\Contracts\Executor\CUpdateExecutor;
use Interpro\Core\Contracts\Mediator\UpdateMediator as UpdateMediatorInterface;
use Interpro\Core\Exception\CoreException;

class UpdateMediator implements UpdateMediatorInterface
{
    private $updateExecutorsA = [];
    private $updateExecutorsB = [];
    private $updateExecutorsC = [];

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\AUpdateExecutor
     */
    public function getAUpdateExecutor($family)
    {
        if(!array_key_exists($family, $this->updateExecutorsA))
        {
            throw new CoreException('Исполнитель изменений (update executor) агрегатных(A) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->updateExecutorsA[$family];
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\BUpdateExecutor
     */
    public function getBUpdateExecutor($family)
    {
        if(!array_key_exists($family, $this->updateExecutorsB))
        {
            throw new CoreException('Исполнитель изменений (update executor) агрегатных(B) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->updateExecutorsB[$family];
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\CUpdateExecutor
     */
    public function getCUpdateExecutor($family)
    {
        if(!array_key_exists($family, $this->updateExecutorsC))
        {
            throw new CoreException('Исполнитель изменений (update executor) простых(C) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->updateExecutorsC[$family];
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\AUpdateExecutor
     *
     * @return void
     */
    public function registerAUpdateExecutor(AUpdateExecutor $updateExecutor)
    {
        $family = $updateExecutor->getFamily();

        if(array_key_exists($family, $this->updateExecutorsA))
        {
            throw new CoreException('Исполнитель изменений (update executor) агрегатных(A) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->updateExecutorsA[$family] = $updateExecutor;
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\BUpdateExecutor
     *
     * @return void
     */
    public function registerBUpdateExecutor(BUpdateExecutor $updateExecutor)
    {
        $family = $updateExecutor->getFamily();

        if(array_key_exists($family, $this->updateExecutorsB))
        {
            throw new CoreException('Исполнитель изменений (update executor) агрегатных(B) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->updateExecutorsB[$family] = $updateExecutor;
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\CUpdateExecutor
     *
     * @return void
     */
    public function registerCUpdateExecutor(CUpdateExecutor $updateExecutor)
    {
        $family = $updateExecutor->getFamily();

        if(array_key_exists($family, $this->updateExecutorsC))
        {
            throw new CoreException('Исполнитель изменений (update executor) простых(С) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->updateExecutorsC[$family] = $updateExecutor;
    }
}
