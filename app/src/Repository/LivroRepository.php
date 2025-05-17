<?php

namespace App\Repository;

use App\Entity\Livro;

class LivroRepository extends AbstractRepository
{
    protected $entityName = Livro::class;
}