<?php

declare(strict_types = 1);

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class InHerd extends AbstractSpecification
{
    /**
     * @var string
     */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getRule(): string
    {
        return 'herd.name = :name';
    }

    public function getParameters()
    {
        return [
            'name' => $this->name,
        ];
    }
}
