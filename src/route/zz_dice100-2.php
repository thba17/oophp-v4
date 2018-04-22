<?php
/**
 * App specific routes.
 * Version 2: Added stop function and calcualtion of round and total score. Player switch.
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

    // Get incoming
    if (isset($_POST['doSetDices'])) {
        $_SESSION["game"]["dices"] = $_POST["dices"];
    }
    $dices = isset($_SESSION["game"]["dices"]) ? $_SESSION["game"]["dices"] : 0;
    $player = $_SESSION["game"]["player"] ?? null;

    // Set session variables
    $game = isset($_SESSION["game"]["game"]) ? $_SESSION["game"]["game"] : null;

    if (isset($_SESSION["game"]["dices"]) && ($dices > 0)) {
        //Dices selected, lock field, create game
        $game = new \Thba17\Dice100\DiceGraphic($_SESSION["game"]["dices"]);
        $_SESSION["game"]["disabled"] = "disabled";
        $_SESSION["game"]["player"] = $_SESSION["game"]["player"] ?? "visitor";
        $_SESSION["game"]["visitor"]["round"] = $_SESSION["game"]["visitor"]["round"] ?? 0;
        $_SESSION["game"]["visitor"]["total"] = $_SESSION["game"]["visitor"]["total"] ?? 0;
        $_SESSION["game"]["computer"]["round"] = $_SESSION["game"]["computer"]["round"] ?? 0;
        $_SESSION["game"]["computer"]["total"] = $_SESSION["game"]["computer"]["total"] ?? 0;
        $_SESSION["game"]["game"] = $game;
    } else {
        // No dices selected, unlock field
        $_SESSION["game"]["disabled"] = "";
    }

    // Check if user made a guess
    $class = [];
    if (isset($_POST['doThrow'])) {
        echo $_SESSION["game"]["player"] . " throws dices ***";
        $player = $_SESSION["game"]["player"];
        $game->roll();
        $_SESSION["game"][$player]["round"] += $game->sum();
        $class = $game->values();
    }

    if (isset($_POST['doStop'])) {
        //Stop current round and add round result to total.
        $player = $_SESSION["game"]["player"];
        $_SESSION["game"][$player]["total"] += $_SESSION["game"][$player]["round"];
        $_SESSION["game"][$player]["round"] = 0;
        if ($player == "visitor") {
            $_SESSION["game"]["player"] = "computer";
        } else {
            $_SESSION["game"]["player"] = "visitor";
        }
    }

    // Add to $data array
    $data += [
        "game" => $game,
        "class" => $class,
        "player" => $player,
        "dices" => $dices,
    ];

    // Add view and render page
    $app->view->add("dice100/dice100", $data);
    $app->page->render($data);
});
