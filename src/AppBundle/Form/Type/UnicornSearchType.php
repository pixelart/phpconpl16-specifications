<?php

declare(strict_types = 1);

namespace AppBundle\Form\Type;

use AppBundle\Form\Type\Transformer\SpecToStringTransformer;
use AppBundle\Spec;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class UnicornSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $age = $builder
            ->create('age')
            ->addModelTransformer(
                new SpecToStringTransformer(Spec\Age::class, 'age')
            );

        $herd = $builder
            ->create('herd')
            ->addModelTransformer(
                new SpecToStringTransformer(Spec\InHerd::class, 'name')
            );

        $builder
            ->add($age)
            ->add($herd)
            ->add('submit', SubmitType::class)
        ;
    }
}
