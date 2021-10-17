<?php

namespace Tests;

use App\Football;
use PHPUnit\Framework\TestCase;

class FootballTest extends TestCase
{
    public function test_total_score()
    {
        $football = new Football();

        $manutd_total = $football->run('manutd');

        $this->assertSame(62, $manutd_total);
    }
}