<?php
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload.php");

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

$number = $_POST["number"] ?? -1;
if (is_null($number)) {
    $number = -1;
}
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? null;

// Start new game
$game = new Guess($number, $tries);

// Check if user made a guess
$res = null;
if (isset($_POST['doGuess'])) {
    $res = $game->makeGuess($guess);
}

// Check if user requests a new game
if (isset($_POST['doRestart'])) {
    $game->random();
}

require __DIR__ . '/view/game-post.php';
