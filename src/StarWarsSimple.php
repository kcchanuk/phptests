<?php
function run(string $character): ?int {
    /*
    * Write your code below; return type and arguments should be according to the problem\'s requirements
    */

    // For a given character (https://challenges.hackajob.co/swapi/api/people/?search= + character)
    // return the number of films where that character appeared

    $numberOfFilms = null;

    $url = "https://challenges.hackajob.co/swapi/api/people/?search=" . urlencode($character);

    // create curl resource
    $ch = curl_init();

    // set url
    curl_setopt($ch, CURLOPT_URL, $url);

    // return as string
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    // return as JSON by setting the HTTP header
    $headers = array("Accept: application/json");
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // store json
    $character_json = curl_exec($ch);

    // close curl resource to free up system resources
    curl_close($ch);

    // set character object
    $character_obj = json_decode($character_json);

    // get the "results" array item if "results" array is not empty
    // return null if the character does not have any film
    if (!empty($character_obj->results)) {
        $results = $character_obj->results[0];

        // get the "films" array item count
        $numberOfFilms = count($results->films);
    }

    return $numberOfFilms;
}
