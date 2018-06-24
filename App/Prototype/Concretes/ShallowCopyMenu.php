<?php

namespace App\Prototype\Concretes;

use App\Prototype\MenuPrototype;

class ShallowCopyMenu extends MenuPrototype
{
    protected function __clone()
    {
    }
}