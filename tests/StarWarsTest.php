<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

require_once ('src/StarWars.php');

class StarWarsTest extends TestCase
{
    /**
     * Test Normal Situation
     */
    public function testNormal()
    {
        $this->assertSame("A New Hope: Beru Whitesun lars, Biggs Darklighter, C-3PO, Chewbacca, Darth Vader, Greedo, Han Solo, Jabba Desilijic Tiure, Jek Tono Porkins, Leia Organa, Luke Skywalker, Obi-Wan Kenobi, Owen Lars, R2-D2, R5-D4, Raymus Antilles, Wedge Antilles, Wilhuff Tarkin; Raymus Antilles: A New Hope, Revenge of the Sith",
            run("A New Hope", "Raymus Antilles"));
    }

    /**
     * Test No Such Character
     */
    public function testNoSuchCharacter()
    {
        $this->assertSame("The Force Awakens: Ackbar, BB8, Captain Phasma, Chewbacca, Finn, Han Solo, Leia Organa, Luke Skywalker, Poe Dameron, R2-D2, Rey; Walter White: none",
            run("The Force Awakens", "Walter White"));
    }
}