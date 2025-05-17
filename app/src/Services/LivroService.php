<?php

namespace App\Services;

use App\Repository\LivroRepository;

class LivroService
{
     public function __construct(private LivroRepository $livroRepository)
    {}

    public function getLivros()
    {
        $umlivro = $this->livroRepository->all();
dd($umlivro);    
    }

    public function getLivro($id)
    {
        return $this->livroRepository->find($id);
    }


}