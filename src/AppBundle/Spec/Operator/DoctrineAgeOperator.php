<?php

declare(strict_types = 1);

namespace AppBundle\Spec\Operator;

class DoctrineAgeOperator
{
    public function __invoke(int $age): string
    {
        return sprintf(
            "DATE_SUB(CURRENT_DATE(), %d, 'month')",
            $age * 12
        );
    }
}
