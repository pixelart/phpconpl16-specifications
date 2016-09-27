<?php

declare(strict_types = 1);

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class AwesomeUnicorn extends AbstractSpecification
{
    public function getRule(): string
    {
        return 'canFly = true and poopsRainbows = true and color = :color';
    }

    public function getParameters(): array
    {
        return [
            'color' => 'white',
        ];
    }
}
