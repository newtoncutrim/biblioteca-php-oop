<?php

namespace App\Repository;

use App\Entity\Book;

class BookRepository extends AbstractRepository
{
    protected $entityName = Book::class;
}