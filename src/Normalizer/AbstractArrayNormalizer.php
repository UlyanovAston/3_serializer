<?php

namespace App\Normalizer;

use Symfony\Component\Serializer\Normalizer\NormalizerInterface;

class AbstractArrayNormalizer implements NormalizerInterface
{
    public function normalize($object, string $format = null, array $context = [])
    {
        return [
            'field_one' => $object['field_one'],
            'field_two' => $object['field_two'],
        ];
    }

    public function supportsNormalization($data, string $format = null)
    {
        return true;
    }

}
