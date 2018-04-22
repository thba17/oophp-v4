<?php
namespace Thba17\Dice100;

/**
 * A graphic dice.
 */
class DiceGraphic extends DiceHand
{
    const SIDES = 6;
    // const DICES = 5;
    private $dices;


/**
 * gameInit A function to initialize the game object
 *
 * @return void
 */
    public function gameInit()
    {
        $_SESSION["game"]["disabled"] = "disabled";
        $_SESSION["game"]["stopGame"] = $_SESSION["game"]["stopGame"] ?? null;
        $_SESSION["game"]["player"] = $_SESSION["game"]["player"] ?? "Visitor";
        $_SESSION["game"]["winner"] = $_SESSION["game"]["winner"] ?? null;
        $_SESSION["game"]["Visitor"]["values"] = $_SESSION["game"]["Visitor"]["values"] ?? 0;
        $_SESSION["game"]["Visitor"]["roundSum"] = $_SESSION["game"]["Visitor"]["roundSum"] ?? 0;
        $_SESSION["game"]["Visitor"]["roundTotal"] = $_SESSION["game"]["Visitor"]["roundTotal"] ?? 0;
        $_SESSION["game"]["Visitor"]["grandTotal"] = $_SESSION["game"]["Visitor"]["grandTotal"] ?? 0;
        $_SESSION["game"]["Computer"]["values"] = $_SESSION["game"]["Computer"]["values"] ?? 0;
        $_SESSION["game"]["Computer"]["roundSum"] = $_SESSION["game"]["Computer"]["roundSum"] ?? 0;
        $_SESSION["game"]["Computer"]["roundTotal"] = $_SESSION["game"]["Computer"]["roundTotal"] ?? 0;
        $_SESSION["game"]["Computer"]["grandTotal"] = $_SESSION["game"]["Computer"]["grandTotal"] ?? 0;
    }

    /**
     * playComputer A function to roll dices for the computer. Called from
     * src/route/dice100.php
     *
     * @return void
     */
    public function playComputer()
    {
        // echo "In playComputer";
        $_SESSION["game"]["Computer"]["roundSum"] = 0;
        $_SESSION["game"]["Computer"]["roundTotal"] = 0;
        $this->roll();
        $_SESSION["game"]["Computer"]["values"] = $this->values();

        if (!array_search(1, $_SESSION["game"]["Computer"]["values"])) {
            $_SESSION["game"]["Computer"]["roundSum"] = $this->sum();
            $_SESSION["game"]["Computer"]["roundTotal"] += $_SESSION["game"]["Computer"]["roundSum"];
            if (($_SESSION["game"]["Computer"]["grandTotal"] + $_SESSION["game"]["Computer"]["roundTotal"]) >= 100) {
                $_SESSION["game"]["winner"] = $_SESSION["game"]["player"];
                $_SESSION["game"]["stopGame"] = "disabled";
            }
            $_SESSION["game"]["Computer"]["grandTotal"] += $_SESSION["game"]["Computer"]["roundTotal"];
        }
    }

    /**
     * Constructor to initiate five dices with six number of sides.
     *
     * @param integer $dices Number of dices to use in the game
     */
    public function __construct(int $dices = 1)
    {
        $this->dices = $dices;
        parent::__construct($this->dices, self::SIDES);
    }
}
