<?php
namespace Thba17\Guess;

include(__DIR__ . "/config.php");
include(__DIR__ . "/../../vendor/autoload.php");

/**
 * Game control for Guess my number.
 * Available functions:
 * new Guess($number, $tries); -- Create new game.
 * makeGuess($number); -- Make a guess.
 * number(); -- Get the secret number.
 * tries() -- Get number of tries left.
 * random() -- Randomize the secret number.
 *
 */

$number = $_GET["number"] ?? -1;
if (is_null($number)) {
    $number = -1;
}
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;

// Start new game
$game = new Guess($number, $tries);

// Check if user made a guess
$res = null;
if (isset($_GET['doGuess'])) {
    $res = $game->makeGuess($guess);
}

// Check if user requests a new game
if (isset($_GET['doRestart'])) {
    $game->random();
}
