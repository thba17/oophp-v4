<?php
// Test program to run from command prompt
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

$game = new Guess();
// $game = new Guess(43, 5);
do {
    $mine = rand(1, 100);
    echo "Secret number is: " . $game->number() . "\n";
    echo "Tries left are: " . $game->tries() . "\n";
    echo "Your guess was $mine " . $game->makeGuess($mine) . "\n";
    echo "Tries left are: " . $game->tries() . "\n";
} while ($game->tries() > 0);
