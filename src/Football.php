<?php

namespace App;

class Football
{
    public function run(string $team_key)
    {
        $url = "https://s3.eu-west-1.amazonaws.com/hackajob-assets1.p.hackajob/challenges/football_session/football.json";

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
        $football_json = curl_exec($ch);

        // close curl resource to free up system resources
        curl_close($ch);

        // set football object
        $football_obj = json_decode($football_json);
        // var_dump($football_obj);

        // get the "rounds" array
        $rounds = $football_obj->rounds;
        // var_dump($rounds);

        // create the total variable to store the result
        $total = 0;

        // loop through the "rounds" array
        foreach ($rounds as $round) {
            // loop through the "matches" array
            foreach ($round->matches as $match) {
                if ($match->team1->key == $team_key) {
                    $total += $match->score1;
                } elseif ($match->team2->key == $team_key) {
                    $total += $match->score2;
                }
            }
        }

        return $total;
    }
}

