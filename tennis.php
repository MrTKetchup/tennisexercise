<?php

$players = [
    ['name' => 'Andy Murray', 'surfaceRating' => [ /*lawnrating*/ 7, /*clayrating*/ 6, /*hardRating*/ 10], 'weatherRating' => [/*rainRating*/ 8, /*dryRating*/ 3, /*snowRating*/ 9, /*sunnyRating*/ 8]],
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

function determinePlayerScore(array $player, array $matchConditions): int {
    return $player['surfaceRating'][$matchConditions[0]] * $player['weatherRating'][$matchConditions[1]];
}

$matchConditions = generateMatchConditions($surfaces, $weathers);
$playerOneScore = determinePlayerScore($players[0], $matchConditions);
$playerTwoScore = determinePlayerScore($players[1], $matchConditions);

function determineMatchWinner(array $playerOne, int $playerOneScore, array $playerTwo, int $playerTwoScore) {
    if ($playerOneScore == $playerTwoScore) {
        echo "DRAW";
    } else if ($playerOneScore > $playerTwoScore) {
        echo $playerOne['name'] . " wins";
    } else {
        echo $playerTwo['name'] . " wins";
    }
}

$matchWinner = determineMatchWinner($players[0], $playerOneScore, $players[1], $playerTwoScore);


echo "<pre>";
echo "weather conditions:";
var_dump ($matchConditions);
echo "</pre";

echo "<br>";
echo "Player One Score:";
echo ($playerOneScore);
echo "<br";

echo "<br>";
echo "Player Two Score:";
echo ($playerTwoScore);
echo "<br";

// echo "<pre>";
// echo $matchWinner;
// echo "</pre";