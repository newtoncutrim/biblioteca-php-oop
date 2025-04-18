<?php
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// Pega o entity manager do seu config
$entityManager = require_once __DIR__ . '/src/Conf/Doctrine.php';

return ConsoleRunner::createHelperSet($entityManager);
