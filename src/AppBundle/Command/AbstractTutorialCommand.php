<?php

declare(strict_types = 1);

namespace AppBundle\Command;

use AppBundle\Spec\Operator\ArrayAgeOperator;
use RulerZ\Compiler\FileCompiler;
use RulerZ\Compiler\Target;
use RulerZ\Parser\HoaParser;
use RulerZ\RulerZ;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;

abstract class AbstractTutorialCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $reflClass = new \ReflectionClass($this);
        $this->setName('step:'.substr(substr($reflClass->getShortName(), 0, -7), 4));
    }

    protected function getRulerZ(): RulerZ
    {
        // compiler
        $compiler = new FileCompiler(
            new HoaParser(),
            $this->getContainer()->getParameter('kernel.cache_dir').'/rulerz'
        );

        // RulerZ engine
        return new RulerZ(
            $compiler, [
                new Target\Sql\DoctrineQueryBuilderVisitor(),
                new Target\ArrayVisitor([
                    'age' => new ArrayAgeOperator(),
                ]),
            ]
        );
    }
}
