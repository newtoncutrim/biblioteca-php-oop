<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class ExemploTest extends TestCase
{
    public function test_soma_simples()
    {
        $this->assertEquals(4, 2 + 2);
    }
}
