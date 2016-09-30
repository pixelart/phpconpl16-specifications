<?php

declare(strict_types = 1);

namespace AppBundle\Spec;

use RulerZ\Spec\AbstractSpecification;

class Age extends AbstractSpecification
{
    private $age;

    /**
     * @param $age
     */
    public function __construct($age)
    {
        $this->age = $age;
    }

    public function getRule()
    {
        return 'birthDate > age(:age)';
    }

    public function getParameters()
    {
        return [
            'age' => $this->age,
        ];
    }
}
