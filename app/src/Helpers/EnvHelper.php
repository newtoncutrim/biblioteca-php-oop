<?php

namespace App\Helpers;

class EnvHelper
{
    public static function get(string $key): string
    {
        return $_ENV[$key] ?? '';
    }
}