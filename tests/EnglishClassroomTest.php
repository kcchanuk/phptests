<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once ('src/EnglishClassroom.php');

class EnglishClassroomTest extends TestCase
{
    /**
     * Test Morse Code to English
     */
    public function testMorseCodeToEnglish()
    {
        $this->assertSame("the wizard quickly jinxed the gnomes before they vaporized.",
            run(true, "- .... .   .-- .. --.. .- .-. -..   --.- ..- .. -.-. -.- .-.. -.--   .--- .. -. -..- . -..   - .... .   --. -. --- -- . ...   -... . ..-. --- .-. .   - .... . -.--   ...- .- .--. --- .-. .. --.. . -.. .-.-.-"));
    }

    /**
     * Test English to Morse Code
     */
    public function testEnglishToMorseCode()
    {
        $this->assertSame("- .... .   .-- .. --.. .- .-. -..   --.- ..- .. -.-. -.- .-.. -.--   .--- .. -. -..- . -..   - .... .   --. -. --- -- . ...   -... . ..-. --- .-. .   - .... . -.--   ...- .- .--. --- .-. .. --.. . -.. .-.-.-",
            run(false, "The wizard quickly jinxed the gnomes before they vaporized."));
    }

    /**
     * Test Invalid Morse Code Input
     */
    public function testInvalidMorseCode()
    {
        $this->assertSame("Invalid Morse Code Or Spacing",
            run(true, "-  ....  .............."));
    }

    /**
     * Test Invalid English Input
     */
    public function testInvalidEnglish()
    {
        $this->assertSame("Invalid Morse Code Or Spacing",
            run(false, ""));
    }
}