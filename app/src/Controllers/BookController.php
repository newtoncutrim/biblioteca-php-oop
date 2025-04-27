<?php

namespace App\Controllers;

class BookController
{
    public function index()
    {
        echo 'BookController';
    }

    public function show($id)
    {
        echo 'BookController - ' . $id;
    }

    public function create()
    {
        echo 'BookController - create';
    }

    public function update($id)
    {
        echo 'BookController - update - ' . $id;
    }

    public function delete($id)
    {
        echo 'BookController - delete - ' . $id;
    }
}