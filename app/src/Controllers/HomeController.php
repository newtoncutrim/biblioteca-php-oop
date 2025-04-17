<?php

namespace App\Controllers;

class HomeController
{
    public function index(): string
    {
        return json_encode([
            'message' => 'Hello World',
            'author' => 'Newton'
        ]);
    }
}