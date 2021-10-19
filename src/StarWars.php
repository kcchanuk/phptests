<?php

function run(string $film, string $character): ?string
{
    /*
    * Write your code below; return type and arguments should be according to the problem\'s requirements
    */

    /*
     * For a given character (https://challenges.hackajob.co/swapi/api/people/?search= + character) and
     * film (https://challenges.hackajob.co/swapi/api/films/?search= + film),
     * return a list with the film titles in which the character appears in (sorted alphabetically) and
     * another list with the character names in the film (sorted alphabetically).
     * Separate the titles and names with commas and then separate both lists with a semicolon.
     */

    // Initialize result variables
    $filmsAndCharacters = null;
    $output_characters = [];
    $output_films = [];

    // Set up CURL
    // create curl resource
    $ch = curl_init();

    // return as string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // return as JSON by setting the HTTP header
    $headers = array("Accept: application/json");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Get Film first
    // set url
    $url = "https://challenges.hackajob.co/swapi/api/films/?search=" . urlencode($film);
    curl_setopt($ch, CURLOPT_URL, $url);

    // store Film JSON
    $film_json = curl_exec($ch);

    // set Film Object
    $film_obj = json_decode($film_json);
    
    // get the "results" array item if "results" array is not empty in the JSON
    if (!empty($film_obj->results)) {
        $film_results = $film_obj->results[0];

        // get the "characters" array of URLs
        $film_characters_urls = $film_results->characters;

        foreach ($film_characters_urls as $film_character_url) {
            // set url
            curl_setopt($ch, CURLOPT_URL, $film_character_url);

            // store Character JSON
            $film_character_json = curl_exec($ch);

            // set Character Object
            $film_character_obj = json_decode($film_character_json);

            // store the name of the Character
            $output_characters[] = $film_character_obj->name;
        }

        // Sort Output Characters
        sort($output_characters);

        $filmsAndCharacters = $film . ': ' . implode(', ' , $output_characters) . '; ';
    } else {
        $filmsAndCharacters = $film . ': none; ';
    }

    // Then get the Character
    // set url
    $url = "https://challenges.hackajob.co/swapi/api/people/?search=" . urlencode($character);
    curl_setopt($ch, CURLOPT_URL, $url);

    // store character JSON
    $character_json = curl_exec($ch);

    // set character Object
    $character_obj = json_decode($character_json);

    // get the "results" array item if "results" array is not empty in the JSON
    if (!empty($character_obj->results)) {
        $character_results = $character_obj->results[0];

        // get the "films" array of URLs
        $character_films_urls = $character_results->films;

        foreach ($character_films_urls as $character_film_url) {
            // set url
            curl_setopt($ch, CURLOPT_URL, $character_film_url);

            // store Film JSON
            $character_film_json = curl_exec($ch);

            // set Film Object
            $character_film_obj = json_decode($character_film_json);

            // store the title of the Film
            $output_films[] = $character_film_obj->title;
        }

        // Sort Output Films
        sort($output_films);

        $filmsAndCharacters .= $character . ': ' . implode(', ' , $output_films);
    } else {
        $filmsAndCharacters .= $character . ': none';
    }

    // close curl resource to free up system resources
    curl_close($ch);

    return $filmsAndCharacters;
}

run("A New Hope", "Luke Skywalker");
