<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once('src/Barracks.php');

final class BarracksTest extends TestCase
{
    // These tests and expected results are provided by the challenge creator
    public function testOne()
    {
        $this->assertSame(279936, run(20, 3));
    }

    public function testTwo()
    {
        $this->assertSame(67108864, run(51, 2));
    }

    public function testThree()
    {
        $this->assertSame(898961331, run(100, 2));
    }

    public function testFour()
    {
        $this->assertSame(8, run(5, 2));
    }
}
