<?php

namespace App\HTTP;

use Symfony\Component\Serializer\SerializerInterface;

class JsonResponse
{
    private static SerializerInterface $serializer;

    public static function init(SerializerInterface $serializer)
    {
        self::$serializer = $serializer;
    }
    public static function send(array|string|object $data, int $status = 200): void
    {
        $data = is_string($data) ? $data : self::$serializer->serialize($data, 'json');

        http_response_code($status);
        header('Content-Type: application/json');

        if (is_array($data)) {
            echo json_encode($data);
        } else {
            echo $data;
        }
    }
}
