<?php

declare(strict_types = 1);

namespace AppBundle\Spec\Operator;

class ArrayAgeOperator
{
    public function __invoke($age): \DateTime
    {
        return new \DateTime('-'.(int) $age.' years');
    }
}
