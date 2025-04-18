<?php

namespace App\Helpers;

class EnvHelper
{
    public static function get(string $key): string
    {
        // Usar $_ENV para acessar variáveis carregadas pelo Dotenv
        return $_ENV[$key] ?? '';
    }
}