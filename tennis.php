<?php

$players = [
    ['name' => 'Andy Murray', 'surfaceRating' => ['lawnRating' => 8, 'clayRating' => 6, 'hardRating' => 5], 'weatherRating' => ['rainRating' => 7, 'dryRating' => 8, 'snowRating' => 6, 'sunnyRating' => 8]],
    ['name' => 'Roger Federer', 'surfaceRating' => ['lawnRating' => 10, 'clayRating' => 8, 'hardRating' => 9], 'weatherRating' => ['rainRating' => 8, 'dryRating' => 8, 'snowRating' => 4, 'sunnyRating' => 10]]
];

// for ($i=0; $i < (count($players))/2; $i++) maybe something like this for sorting out player matches? or could just use array_rand($players, 2)

$surface = ['lawn', 'clay', 'hard'];
$weather = ['rain', 'dry', 'snow', 'sunny'];

function generateMatchConditions($surface, $weather) {
    $matchConditions = [];
    array_push($matchConditions, array_rand($surface, 1));
    array_push($matchConditions, array_rand($weather, 1));
    return $matchConditions;
}


echo "<pre>";
var_dump (generateMatchConditions($surface, $weather));
echo "</pre";