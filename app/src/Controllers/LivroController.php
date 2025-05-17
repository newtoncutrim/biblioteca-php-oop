<?php

namespace App\Controllers;

use App\HTTP\JsonResponse;
use App\Services\LivroService;

class LivroController
{
    public function __construct(private LivroService $livroSevice)
    {
 
    }
    public function livros()
    {
        $livro = $this->livroService->getLivros();
     dd($livro);
    if($livro === null){
        return JsonResponse::send();
    }

    return JsonResponse::send($livro);
    }

































}