<?php
/**
 * App specific routes.
 * Version 1: Done selecting dices, ceating game, throw, reset, display dices results
 */

/**
 *  This route is for the game " Dice 100"
 */
$app->router->any(["GET", "POST"], "dice100/dice100", function () use ($app) {
    $data = [
        "title" => "Tärningsspelet 100",
    ];

    // Check if user requests a new game
    if (isset($_POST['doRestart'])) {
        unset($_SESSION['game']);
    }

    // print_r($_POST); echo "<br>";
    // Get incoming
    if (isset($_POST['doSetDices'])) {
        // $dices = $_POST['dices'];
        $_SESSION["game"]["dices"] = $_POST["dices"];
    }
    $dices = isset($_SESSION["game"]["dices"]) ? $_SESSION["game"]["dices"] : 0;

    // Set session variables
    $game = isset($_SESSION["game"]["game"]) ? $_SESSION["game"]["game"] : null;

    if (isset($_SESSION["game"]["dices"])) {
        //Dices selected, lock field, create game
        $_SESSION["game"]["disabled"] = "disabled";
        $game = new \Thba17\Dice100\DiceGraphic($_SESSION["game"]["dices"]);
        $_SESSION["game"]["game"] = $game;
    } else {
        // No dices selected, unlock field
        $_SESSION["game"]["disabled"] = "";
    }

    // Check if user made a guess
    // print_r($game); echo "<br>";
    // $class = null;
    $class = [];
    if (isset($_POST['doThrow'])) {
        // print_r($game); echo "<br>";
        echo "*** Throw " . $_SESSION["game"]["dices"] . " dices ***";
        $game->roll();
        $class = $game->values();
    }

    // print_r($class); echo "<br>";
    // Add to $data array
    $data += [
        "game" => $game,
        "class" => $class,
        // "res" => $res,
        "dices" => $dices,
    ];
    // print_r($data); echo "<br>";

    // Add view and render page
    $app->view->add("dice100/dice100", $data);
    $app->page->render($data);
});
