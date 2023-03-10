<?php

namespace App\Normalizer;

use App\Entity\Cat;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class OnlyNameCatNormalizer implements NormalizerInterface
{
    /**
     * @param Cat $object
     * @param string|null $format
     * @param array $context
     * @return string[]
     */
    public function normalize($object, string $format = null, array $context = [])
    {
        return [
            'name' => $object->getName(),
        ];
    }

    public function supportsNormalization($data, string $format = null)
    {
        return false;
    }
}
