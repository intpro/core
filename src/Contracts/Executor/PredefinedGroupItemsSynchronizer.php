<?php

namespace Interpro\Core\Contracts\Executor;

use Interpro\Core\Contracts\Mediatable;

interface PredefinedGroupItemsSynchronizer extends Mediatable
{
    /**
     * @return void
     */
    public function sync();
}
