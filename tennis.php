<?php

$players = [
    ['name' => 'Andy Murray', 'surfaceRating' => [ /*lawnrating*/ 2, /*clayrating*/ 2, /*hardRating*/ 2], 'weatherRating' => [/*rainRating*/ 3, /*dryRating*/ 3, /*snowRating*/ 2, /*sunnyRating*/ 8]],
    ['name' => 'Roger Federer', 'surfaceRating' => [ /*lawnrating*/ 10, /*clayrating*/ 9, /*hardRating*/ 8], 'weatherRating' => [/*rainRating*/ 4, /*dryRating*/ 7, /*snowRating*/ 9, /*sunnyRating*/ 10]]
];

// for ($i=0; $i < (count($players))/2; $i++) maybe something like this for sorting out player matches? or could just use array_rand($players, 2)

$surfaces = ['lawn', 'clay', 'hard'];
$weathers = ['rain', 'dry', 'snow', 'sunny'];

function generateMatchConditions(array $surfaces, array $weathers): array {
    $matchConditions = [];
    array_push($matchConditions, array_rand($surfaces, 1));
    array_push($matchConditions, array_rand($weathers, 1));
    return $matchConditions;
}

function determinePlayerScore(array $player, array $surfaces, array $weathers, array $matchConditions): int {
    return $player['surfaceRating'][$matchConditions[0]] * $player['weatherRating'][$matchConditions[1]];
}

$matchConditions = generateMatchConditions($surfaces, $weathers);
$playerScore = determinePlayerScore($players[0], $surfaces, $weathers, $matchConditions);

echo "<pre>";
var_dump ($players[0]);
echo "</pre";

echo "<pre>";
var_dump ($matchConditions);
echo "</pre";

echo "<pre>";
echo ($playerScore);
echo "</pre";

// echo "<pre>";
// var_dump ($matchConditions);
// echo "</pre";