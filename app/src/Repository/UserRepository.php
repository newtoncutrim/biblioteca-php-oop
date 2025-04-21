<?php

namespace App\Repository;

use App\Entity\User;

class UserRepository extends AbstractRepository
{
    protected $entityName = User::class;
}