<?php

namespace App\Prototype\Concretes;

use App\Prototype\MenuPrototype;

class DeepCopyMenu extends MenuPrototype
{
    protected function __clone()
    {
        $this->setComments(clone $this->getComments());
    }
}