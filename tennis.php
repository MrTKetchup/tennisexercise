<?php

$players = [
    ['name' => 'Andy Murray', 'surfaceRating' => [ /*lawnrating*/ 2, /*clayrating*/ 2, /*hardRating*/ 2], 'weatherRating' => [/*rainRating*/ 3, /*dryRating*/ 3, /*snowRating*/ 2, /*sunnyRating*/ 8]],
    ['name' => 'Roger Federer', 'surfaceRating' => [ /*lawnrating*/ 10, /*clayrating*/ 9, /*hardRating*/ 8], 'weatherRating' => [/*rainRating*/ 4, /*dryRating*/ 7, /*snowRating*/ 9, /*sunnyRating*/ 10]]
];

// for ($i=0; $i < (count($players))/2; $i++) maybe something like this for sorting out player matches? or could just use array_rand($players, 2)

$surface = ['lawn', 'clay', 'hard'];
$weather = ['rain', 'dry', 'snow', 'sunny'];

function generateMatchConditions(array $surface, array $weather): array {
    $matchConditions = [];
    array_push($matchConditions, array_rand($surface, 1));
    array_push($matchConditions, array_rand($weather, 1));
    return $matchConditions;
}

function determinePlayerScore(array $player, array $surface, array $weather, array $matchConditions) {
    $playerScore = [];
    for ($i = 0; $i < count($surface); $i++) {
        if ($matchConditions[0] == $i) {
            array_push($playerScore, $player['surfaceRating'][$i]);
        }
    }
    for ($j = 0; $j < count($weather); $j++) {
        if ($matchConditions[1] == $j) {
            array_push($playerScore, $player['weatherRating'][$j]);
        }
    }
    return array_product($playerScore);
}

$matchConditions = generateMatchConditions($surface, $weather);
$playerScore = determinePlayerScore($players[0], $surface, $weather, $matchConditions);

echo "<pre>";
var_dump ($players[0]);
echo "</pre";

echo "<pre>";
var_dump ($matchConditions);
echo "</pre";

echo "<pre>";
var_dump ($playerScore);
echo "</pre";

// echo "<pre>";
// var_dump ($matchConditions);
// echo "</pre";