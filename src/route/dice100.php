<?php
/**
 * App specific routes.
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
    $player = $_SESSION["game"]["player"] ?? "Visitor";

    // Set session variables
    $game = isset($_SESSION["game"]["game"]) ? $_SESSION["game"]["game"] : null;

    if (isset($_SESSION["game"]["dices"]) && ($dices > 0)) {
        //Dices selected, lock field, create game
        $game = new \Thba17\Dice100\DiceGraphic($_SESSION["game"]["dices"]);
        $game->gameInit();
        $_SESSION["game"]["game"] = $game;
    } else {
        // No dices selected, unlock field
        $_SESSION["game"]["disabled"] = "";
    }

    // Player rolls dices. Calculate sum of round.
    if (isset($_POST['doThrow'])) {
        $player = $_SESSION["game"]["player"];
        $game->roll();
        $_SESSION["game"]["Visitor"]["values"] = $game->values();

        if (array_search(1, $_SESSION["game"]["Visitor"]["values"])) {
            $_SESSION["game"][$player]["roundSum"] = 0;
            $_SESSION["game"][$player]["roundTotal"] = 0;
            if ($player == "Visitor") {
                $_SESSION["game"]["player"] = "Computer";
                $game->playComputer();
                $_SESSION["game"]["player"] = "Visitor";
            }
        } else {
            $_SESSION["game"][$player]["roundSum"] = $game->sum();
            $_SESSION["game"][$player]["roundTotal"] += $_SESSION["game"][$player]["roundSum"];
            if (($_SESSION["game"][$player]["grandTotal"] + $_SESSION["game"][$player]["roundTotal"]) >= 100) {
                // $_SESSION["game"][$player]["grandTotal"] += $_SESSION["game"][$player]["roundSum"];
                $_SESSION["game"]["winnerTotal"] = $_SESSION["game"][$player]["grandTotal"] + $_SESSION["game"][$player]["roundTotal"];
                $_SESSION["game"]["winner"] = $_SESSION["game"]["player"];
                $_SESSION["game"]["stopGame"] = "disabled";
            }
        }
    }

    // Player stops the current round. Switch to next player. Update player score.
    if (isset($_POST['doStop'])) {
        //Stop current round and add round result to total.
        $player = $_SESSION["game"]["player"];
        $_SESSION["game"][$player]["grandTotal"] += $_SESSION["game"][$player]["roundTotal"];
        $_SESSION["game"][$player]["roundSum"] = 0;
        $_SESSION["game"][$player]["roundTotal"] = 0;
        if ($player == "Visitor") {
            $_SESSION["game"]["player"] = "Computer";
            $game->playComputer();
            $_SESSION["game"]["player"] = "Visitor";
        }
    }

    // Add to $data array
    $data += [
        "game" => $game,
        "player" => $player,
        "dices" => $dices,
    ];

    // Add view and render page
    $app->view->add("dice100/dice100", $data);
    $app->page->render($data);
});
