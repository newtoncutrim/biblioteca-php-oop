<?php

use App\Conf\Connection;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;

require_once __DIR__ . '/../../vendor/autoload.php';

$isDevMode = true;

$config = ORMSetup::createAttributeMetadataConfiguration(
    [__DIR__ . '/../Entity'],
    $isDevMode,
);

$conn = new Connection();

$connection = DriverManager::getConnection([
    'dbname'   => $conn->getDb(),
    'user'     => $conn->getUser(),
    'password' => $conn->getPass(),
    'host'     => $conn->getHost(),
    'driver'   => 'pdo_mysql',
], $config);

$entityManager = new EntityManager($connection, $config);

return $entityManager;
