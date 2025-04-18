<?php

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Dotenv\Dotenv;
use App\Helpers\EnvHelper;

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__ . '/../../');
$dotenv->load();

$isDevMode = true;

$config = ORMSetup::createAttributeMetadataConfiguration(
    [__DIR__ . '/../Entity'],
    $isDevMode,
);


$connection = DriverManager::getConnection([
    'dbname'   => EnvHelper::get('DB_NAME'),
    'user'     => EnvHelper::get('DB_USER'),
    'password' => EnvHelper::get('DB_PASS'),
    'host'     => EnvHelper::get('DB_HOST'),
    'driver'   => 'pdo_mysql',
], $config);

$entityManager = new EntityManager($connection, $config);

return $entityManager;
