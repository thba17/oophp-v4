<?php
/**
 * App specific routes.
 */

/**
 *  This route is for the guessing game "Gissa mitt nummer" using GET
 */
$app->router->get("gissa/get", function () use ($app) {
    $data = [
        "title" => "Gissa mitt nummer med GET",
    ];

    // Get incoming
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? null;
    $number = $_GET["number"] ?? -1;
    if (is_null($number)) {
        $number = -1;
    }

    // Start new game
    $game = new \Thba17\Guess\Guess($number, $tries);

    // Check if user made a guess
    $res = null;
    if (isset($_GET['doGuess'])) {
        $res = $game->makeGuess($guess);
    }

    // Check if user requests a new game
    if (isset($_GET['doRestart'])) {
        $game->random();
    }

    // Add to $data array
    $data += [
        // "title" => "Spela Gissa mitt nummer med GET | oophp",
        "game" => $game,
        "res" => $res,
    ];

    // Add view and render page
    $app->view->add("guess/get", $data);
    $app->page->render($data);
});


/**
 *  This route is for the guessing game "Gissa mitt nummer" using POST
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {
    $data = [
        "title" => "Gissa mitt nummer med POST",
    ];

    // Get incoming
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? null;
    $number = $_POST["number"] ?? -1;
    if (is_null($number)) {
        $number = -1;
    }

    // Start new game
    $game = new \Thba17\Guess\Guess($number, $tries);

    // Check if user made a guess
    $res = null;
    if (isset($_POST['doGuess'])) {
        $res = $game->makeGuess($guess);
    }

    // Check if user requests a new game
    if (isset($_POST['doRestart'])) {
        $game->random();
    }

    // Add to $data array
    $data += [
        // "title" => "Spela Gissa mitt nummer med GET | oophp",
        "game" => $game,
        "res" => $res,
    ];

    // Add view and render page
    $app->view->add("guess/post", $data);
    $app->page->render($data);
});



/**
 *  This route is for the guessing game "Gissa mitt nummer" using SESSION
 */
$app->router->any(["GET", "POST"], "gissa/session", function () use ($app) {
    $data = [
        "title" => "Gissa mitt nummer med SESSION",
    ];

    // Get incoming
    $guess = isset($_POST["guess"]) ? $_POST["guess"] : null;
    $number = isset($_SESSION['number']) ? $_SESSION['number'] : -1;
    $tries = isset($_SESSION['tries']) ? $_SESSION['tries'] : 6;

    // Start new game
    $game = new \Thba17\Guess\Guess($number, $tries);

    // Check if user made a guess
    $res = null;
    if (isset($_POST['doGuess'])) {
        $res = $game->makeGuess($guess);
    }

    // Check if user requests a new game
    if (isset($_POST['doRestart'])) {
        $game->random();
    }

    // Add to $data array
    $data += [
        // "title" => "Spela Gissa mitt nummer med GET | oophp",
        "game" => $game,
        "res" => $res,
    ];

    // Add view and render page
    $app->view->add("guess/session", $data);
    $app->page->render($data);
});
