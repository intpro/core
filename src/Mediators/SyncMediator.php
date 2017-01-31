<?php

namespace Interpro\Core\Mediators;

use Interpro\Core\Contracts\Executor\ASynchronizer;
use Interpro\Core\Contracts\Executor\OwnSynchronizer;
use Interpro\Core\Contracts\Executor\PredefinedGroupItemsSynchronizer;
use Interpro\Core\Contracts\Mediator\SyncMediator as SyncMediatorInterface;
use Interpro\Core\Exception\CoreException;

class SyncMediator implements SyncMediatorInterface
{
    private $synchronizersA = [];
    private $synchronizersOwn = [];
    private $predefinedGroupItemsSynchronizers = [];

    /**
     * @param \Interpro\Core\Contracts\Executor\PredefinedGroupItemsSynchronizer
     *
     * @return void
     */
    public function registerPredefinedGroupItemsSynchronizer(PredefinedGroupItemsSynchronizer $synchronizer)
    {
        $family = $synchronizer->getFamily();

        if(array_key_exists($family, $this->predefinedGroupItemsSynchronizers))
        {
            throw new CoreException('Синхронизатор предопределенных элементов групп пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->predefinedGroupItemsSynchronizers[$family] = $synchronizer;
    }

    /**
     * @return void
     */
    public function syncPredefinedGroupItems()
    {
        foreach($this->predefinedGroupItemsSynchronizers as $synchronizer)
        {
            $synchronizer->sync();
        }
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\ASynchronizer
     */
    public function getASynchronizer($family)
    {
        if(!array_key_exists($family, $this->synchronizersA))
        {
            throw new CoreException('Синхронизатор агрегатных(A) типов пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->synchronizersA[$family];
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\ASynchronizer
     *
     * @return void
     */
    public function registerASynchronizer(ASynchronizer $synchronizer)
    {
        $family = $synchronizer->getFamily();

        if(array_key_exists($family, $this->synchronizersA))
        {
            throw new CoreException('Синхронизатор агрегатных(A) типов пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->synchronizersA[$family] = $synchronizer;
    }

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\OwnSynchronizer
     */
    public function getOwnSynchronizer($family)
    {
        if(!array_key_exists($family, $this->synchronizersOwn))
        {
            throw new CoreException('Синхронизатор полей типа пакета '.$family.' не найдена в медиаторе!');
        }

        return $this->synchronizersOwn[$family];
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\OwnSynchronizer
     *
     * @return void
     */
    public function registerOwnSynchronizer(OwnSynchronizer $synchronizer)
    {
        $family = $synchronizer->getFamily();

        if(array_key_exists($family, $this->synchronizersOwn))
        {
            throw new CoreException('Синхронизатор полей типа пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->synchronizersOwn[$family] = $synchronizer;
    }

}
