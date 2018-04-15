<?php
require_once(__DIR__ . "/config-sessionStart.php");
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

$guess = isset($_POST["guess"]) ? $_POST["guess"] : null;

$number = isset($_SESSION['number']) ? $_SESSION['number'] : -1;

$tries = isset($_SESSION['tries']) ? $_SESSION['tries'] : 6;

$game = new Guess($number, $tries);

// Check if user made a guess
$res = null;
if (isset($_POST['doGuess'])) {
    $res = $game->makeGuess($guess);
}

if (isset($_POST['doRestart'])) {
    $game->random();
}

require __DIR__ . '/view/game-session.php';

$_SESSION['number'] = $game->number();
$_SESSION['tries'] = $game->tries();

// session_unset();
// session_destroy();
