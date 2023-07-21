<?php

$players = [
    ['name' => 'Andy Murray', 'surfaceRating' => [ /*lawnrating*/ 7, /*clayrating*/ 6, /*hardRating*/ 10], 'weatherRating' => [/*rainRating*/ 8, /*dryRating*/ 3, /*snowRating*/ 9, /*sunnyRating*/ 8]],
    ['name' => 'Roger Federer', 'surfaceRating' => [ /*lawnrating*/ 10, /*clayrating*/ 9, /*hardRating*/ 8], 'weatherRating' => [/*rainRating*/ 4, /*dryRating*/ 7, /*snowRating*/ 9, /*sunnyRating*/ 10]],
    ['name' => 'Rafa Nadal', 'surfaceRating' => [ /*lawnrating*/ 8, /*clayrating*/ 4, /*hardRating*/ 3], 'weatherRating' => [/*rainRating*/ 3, /*dryRating*/ 3, /*snowRating*/ 9, /*sunnyRating*/ 8]],
    ['name' => 'Novak Djokovic', 'surfaceRating' => [ /*lawnrating*/ 10, /*clayrating*/ 1, /*hardRating*/ 5], 'weatherRating' => [/*rainRating*/ 4, /*dryRating*/ 10, /*snowRating*/ 4, /*sunnyRating*/ 10]]
];


shuffle($players);

// echo "<pre>";
// echo "match draw";
// var_dump($players);
// echo "</pre";

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

$matchConditionsOne = generateMatchConditions($surfaces, $weathers);
$matchConditionsTwo = generateMatchConditions($surfaces, $weathers);

$playerOneScore = determinePlayerScore($players[0], $matchConditionsOne);
$playerTwoScore = determinePlayerScore($players[1], $matchConditionsOne);
$playerThreeScore = determinePlayerScore($players[2], $matchConditionsTwo);
$playerFourScore = determinePlayerScore($players[3], $matchConditionsTwo);

function determineMatchWinner(array $playerOne, int $playerOneScore, array $playerTwo, int $playerTwoScore) {
    if ($playerOneScore == $playerTwoScore) {
        echo "DRAW" . "</br>";
    } else if ($playerOneScore > $playerTwoScore) {
        echo $playerOne['name'] . " wins" . "</br>";
    } else {
        echo $playerTwo['name'] . " wins" . "</br>";
    }
}

$matchWinnerOne = determineMatchWinner($players[0], $playerOneScore, $players[1], $playerTwoScore);
$matchWinnerTwo = determineMatchWinner($players[2], $playerThreeScore, $players[3], $playerFourScore);


echo "<pre>";
echo "weather conditions match one:";
var_dump ($matchConditionsOne);
echo "</pre";

echo "<pre>";
echo "weather conditions match two:";
var_dump ($matchConditionsTwo);
echo "</pre";

echo "<pre>";
echo $players[0]['name'] . " Score: </br>";
echo ($playerOneScore). "</br>";
echo "</pre";

echo "<pre>";
echo $players[1]['name'] . " Score: </br>";
echo ($playerTwoScore). "</br>";
echo "</pre";

echo "<pre>";
echo $players[2]['name'] . " Score: </br>";
echo ($playerThreeScore) . "</br>";
echo "</pre";

echo "<pre>";
echo $players[3]['name'] . " Score: </br>";
echo ($playerFourScore). "</br>";
echo "</pre";
