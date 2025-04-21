<?php

namespace App\HTTP;

class Request
{
    private array $data;
    public function __construct()
    {
        $input = file_get_contents('php://input');
        $dataArray = json_decode($input, true);

        if ($dataArray) {
            $this->data = $dataArray;
            return;
        }

        $this->data = $_REQUEST;
    }

    public function get(string $key)
    {
        return $this->data[$key];
    }

    public function all()
    {
        return $this->data;
    }
}