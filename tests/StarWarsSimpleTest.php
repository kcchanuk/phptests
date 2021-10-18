<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once ('src/StarWarsSimple.php');

class StarWarsSimpleTest extends TestCase
{
    /**
     * Test Luke Skywalker
     */
    public function testLukeSkywalker()
    {
        $this->assertSame(5, run("Luke Skywalker"));
    }

    /**
     * Test Nobody
     */
    public function testNobody()
    {
        $this->assertNull(run("No-Body"));
    }
}