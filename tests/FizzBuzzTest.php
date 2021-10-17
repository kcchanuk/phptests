<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once('src/FizzBuzz.php');

final class FizzBuzzTest extends TestCase
{
    /**
     * Test number 1 to 30
     */
    public function testOneToThirty()
    {
        $this->assertSame('1,2,Fizz,4,Buzz,Fizz,7,8,Fizz,Buzz,11,Fizz,13,14,FizzBuzz,16,17,Fizz,19,Buzz,Fizz,22,23,Fizz,Buzz,26,Fizz,28,29,FizzBuzz', run(1, 30));
    }

    /**
     * Test same number with 1 (not multiples of 3 or 5)
     */
    public function testSameNumberOne()
    {
        $this->assertSame('1', run(1, 1));
    }

    /**
     * Test same number with 3 (i.e. multiple of 3 only)
     */
    public function testSameNumberThree()
    {
        $this->assertSame('Fizz', run(3, 3));
    }

    /**
     * Test same number with 5(i.e. multiple of 5 only)
     */
    public function testSameNumberFive()
    {
        $this->assertSame('Buzz', run(5, 5));
    }

    /**
     * Test same number with 30 (i.e. multiples of 3 and 5)
     */
    public function testSameNumberThirty()
    {
        $this->assertSame('FizzBuzz', run(15, 15));
    }

    /**
     * Test invalid parameters with second parameter being larger than the first parameter
     */
    public function testExpectNull()
    {
        $this->assertNull(run(30, 1));
    }
}
