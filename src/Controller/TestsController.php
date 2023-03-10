<?php

namespace App\Controller;

use App\Entity\Cat;
use App\Entity\GroupObject;
use App\Entity\SerializableCat;
use App\Normalizer\OnlyNameCatNormalizer;
use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

class TestsController extends AbstractController
{
    public function one(): JsonResponse
    {
        $cat = new SerializableCat('Барсик', 2);

        return new JsonResponse([
            'cat' => $cat,
        ]);
    }

    public function two(): JsonResponse
    {
        $cat = new Cat('Барсик', 2);

        $serializer = new Serializer([new OnlyNameCatNormalizer()]);

        return new JsonResponse([
            'cat' => $serializer->normalize($cat),
        ]);
    }

    public function three(SerializerInterface $serializer): JsonResponse
    {
        $cat = new Cat('Барсик', 2);

        return new JsonResponse([
            'cat' => $serializer->normalize($cat),
        ]);
    }

    public function four(): JsonResponse
    {
        $cat = new Cat('Барсик', 2);

        $objectListNormalizer = new GetSetMethodNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer([$objectListNormalizer]);

        return $this->json([
            'cat' => $serializer->normalize($cat),
        ]);
    }

    public function five(): JsonResponse
    {
        $cat = new Cat('Барсик', 2);

        $objectListNormalizer = new GetSetMethodNormalizer(null, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer([$objectListNormalizer], [new XmlEncoder()]);

        return new JsonResponse([
            'cat' => $serializer->serialize($cat, 'json'),
        ]);
    }

    public function six(): JsonResponse
    {
        $obj = new GroupObject('foo', 'bar', 'xyz');

        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $objectListNormalizer = new GetSetMethodNormalizer($classMetadataFactory, new CamelCaseToSnakeCaseNameConverter());
        $serializer = new Serializer([$objectListNormalizer], [new XmlEncoder()]);

        return new JsonResponse([
            'obj' => $serializer->normalize($obj, null, ['groups' => ['two']]),
        ]);
    }
}
