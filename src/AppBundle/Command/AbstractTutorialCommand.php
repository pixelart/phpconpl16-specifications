<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

abstract class AbstractTutorialCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $reflClass = new \ReflectionClass($this);
        $this->setName('step:'.substr(substr($reflClass->getShortName(), 0, -7), 4));
    }
}
