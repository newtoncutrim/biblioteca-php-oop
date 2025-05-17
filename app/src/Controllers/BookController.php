<?php

namespace App\Controllers;

use App\HTTP\JsonResponse;
use App\Services\BookService;

class BookController
{
    public function __construct(private BookService $livroSevice)
    {
 
    }
    public function index()
    {
        $livro = $this->livroSevice->getLivros();
        dd($livro);
        if($livro === null){
            return JsonResponse::send('', 404);
        }

        return JsonResponse::send($livro);
    }

































}