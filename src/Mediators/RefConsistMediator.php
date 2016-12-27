<?php

namespace Interpro\Core\Mediators;

use Interpro\Core\Contracts\Executor\RefConsistExecutor;
use Interpro\Core\Contracts\Mediator\RefConsistMediator as RefConsistMediatorInterface;
use Interpro\Core\Contracts\Ref\ARef;
use Interpro\Core\Exception\CoreException;

class RefConsistMediator implements RefConsistMediatorInterface
{
    private $executors = [];

    /**
     * @param string $family
     *
     * @return \Interpro\Core\Contracts\Executor\RefConsistExecutor
     */
    public function getRefConsistExecutor($family)
    {
        if(!array_key_exists($family, $this->executors))
        {
            throw new CoreException('Хранитель ссылок (ConsistExecutor) пакета '.$family.' не найден в медиаторе!');
        }

        return $this->executors[$family];
    }

    /**
     * @param \Interpro\Core\Contracts\Executor\RefConsistExecutor
     *
     * @return void
     */
    public function registerRefConsistExecutor(RefConsistExecutor $refConsistExecutor)
    {
        $family = $refConsistExecutor->getFamily();

        if(array_key_exists($family, $this->executors))
        {
            throw new CoreException('Хранитель (ConsistExecutor) пакета '.$family.' уже зарегестрирована в медиаторе!');
        }

        $this->executors[$family] = $refConsistExecutor;
    }

    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return void
     */
    public function notify(ARef $ref)
    {
        $subs = $ref->getType()->getSubs('all');

        $families = [];

        foreach($subs as $refType)
        {
            $family_name = $refType->getFamily();

            if(in_array($family_name, $families))
            {
                continue;
            }

            $refConsistExecutor = $this->getRefConsistExecutor($family_name);
            $refConsistExecutor->execute($ref);

            $families[] = $family_name;
        }
    }

    /**
     * @param \Interpro\Core\Contracts\Ref\ARef $ref
     *
     * @return bool
     */
    public function exist(ARef $ref)
    {
        $family = $ref->getType()->getFamily();

        $refConsistExecutor = $this->getRefConsistExecutor($family);

        return $refConsistExecutor->exist($ref);
    }
}
