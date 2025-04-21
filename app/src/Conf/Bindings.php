<?php

namespace App\Bindings;

use App\Conf\Container;
use App\HTTP\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;

return function (Container $container): void {
    $entityManager = require __DIR__ . '/Doctrine.php';

    $normalizer = new ObjectNormalizer(
        null,
        null,
        new PropertyAccessor(),
        new ReflectionExtractor()
    );

    $serializer = new Serializer([$normalizer], [new JsonEncoder()]);

    $container->bind(EntityManagerInterface::class, $entityManager);
    $container->bind(SerializerInterface::class, $serializer);

    JsonResponse::init($serializer);
};