<?php

namespace App\Services;

use App\Repository\BookRepository;

class BookService
{
     public function __construct(private BookRepository $bookRepository)
    {}

    public function getLivros()
    {
        return $this->bookRepository->all(); 
    }

    public function getLivro($id)
    {
        return $this->bookRepository->find($id);
    }


}