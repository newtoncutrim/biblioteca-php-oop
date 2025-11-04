<?php

namespace App\HTTP;

use Symfony\Component\Serializer\SerializerInterface;

class JsonResponse
{
    public function __construct(
        public mixed $data,
        public int $status = 200
    ) {}

    private static SerializerInterface $serializer;

    public static function init(SerializerInterface $serializer)
    {
        self::$serializer = $serializer;
    }

    public static function send(array|string|object $data, int $status = 200): self
    {
        // Só transforma em JSON aqui, não imprime
        $data = is_string($data) ? $data : self::$serializer->serialize($data, 'json');
        return new self($data, $status);
    }

    public function output(): void
    {
        http_response_code($this->status);
        header('Content-Type: application/json');
        echo $this->data;
    }
}
