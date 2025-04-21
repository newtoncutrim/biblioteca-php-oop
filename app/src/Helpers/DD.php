<?php

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        echo "<pre style='background: #1d1f21; color: #c5c8c6; padding: 15px; border-radius: 8px; font-size: 14px;'>";
        foreach ($vars as $var) {
            var_dump($var);
            echo "\n";
        }
        echo "</pre>";
        die;
    }
}
