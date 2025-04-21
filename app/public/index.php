<?php

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../src/Helpers/DD.php';

$entityManager = require_once __DIR__ . '/../src/Conf/Doctrine.php';

use App\Conf\Container;
use App\Routes\Api;
use App\Controllers\HomeController;
use App\Controllers\UserController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\ReflectionExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\SerializerInterface;
$normalizer = new ObjectNormalizer(
    null,
    null,
    new PropertyAccessor(),
    new ReflectionExtractor()
);
$serializer = new Serializer([$normalizer], [new JsonEncoder()]);
$container = new Container();
$container->bind(EntityManagerInterface::class, $entityManager);
$container->bind(SerializerInterface::class, $serializer);

Api::get('/', [HomeController::class, 'index']);
Api::post('/create', [UserController::class, 'create']);

Api::dispatch($container);