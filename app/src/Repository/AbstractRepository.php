<?php

namespace App\Repository;

use App\Conf\Connection;

abstract class AbstractRepository
{
    protected $db;

    public function __construct()
    {
        $this->db = Connection::connect();
    }
}