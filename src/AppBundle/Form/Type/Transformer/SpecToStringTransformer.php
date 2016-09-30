<?php

declare(strict_types = 1);

namespace AppBundle\Form\Type\Transformer;

use RulerZ\Spec\Specification;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\PropertyAccess\PropertyAccess;

class SpecToStringTransformer implements DataTransformerInterface
{
    private $specificationClass;
    private $valuePath;
    private $accessor;

    public function __construct($specificationClass, $valuePath)
    {
        $this->specificationClass = $specificationClass;
        $this->valuePath          = $valuePath;
        $this->accessor           = PropertyAccess::createPropertyAccessor();
    }

    /**
     * Transforms a specification into a string.
     *
     * @param Specification|null $specification
     *
     * @return string
     */
    public function transform($specification)
    {
        if ($specification === null) {
            return '';
        }

        return $this->accessor->getValue($specification, $this->valuePath);
    }

    /**
     * Transforms a string into a specification.
     *
     * @param string $string
     *
     * @return Specification|null
     */
    public function reverseTransform($string)
    {
        if (!$string) {
            return null;
        }

        $class = $this->specificationClass;

        return new $class($string);
    }
}
