<?php

declare(strict_types = 1);

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use RulerZ\RulerZ;
use RulerZ\Spec\Specification;

class UnicornRepository extends EntityRepository
{
    /**
     * @var RulerZ
     */
    private $rulerz;

    /**
     * @param RulerZ $rulerz
     */
    public function setRulerz(RulerZ $rulerz)
    {
        $this->rulerz = $rulerz;
    }

    public function matchSpec(Specification $spec)
    {
        $qb = $this->createQueryBuilder('u');

        return $this->rulerz->filterSpec($qb, $spec);
    }
}
