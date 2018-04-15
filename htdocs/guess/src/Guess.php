<?php
/**
 * Guess my number, a class supporting the game through GET, POST and SESSION.
 */
class Guess
{
    /**
     * @var int $number   The current secret number.
     * @var int $tries    Number of tries a guess has been made.
     */
    private $number;
    private $tries;



    /**
     * Randomize the secret number between 1 and 100 to initiate a new game.
     *
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     *
     * @return void
     */
    public function random(int $tries = 6)
    {
        $this->number = rand(1, 100);
        $this->tries = $tries;
    }



    /**
     * Get number of tries left.
     *
     * @return int as number of tries made.
     */
    public function tries()
    {
        return $this->tries;
    }



    /**
     * Get the secret number.
     *
     * @return int as the secret number.
     */
    public function number()
    {
        return $this->number;
    }



    /**
     * Make a guess, decrease remaining guesses and return a string stating
     * if the guess was correct, too low or to high or if no guesses remains.
     *
     * @throws GuessException when guessed number is out of bounds.
     *
     * @return string to show the status of the guess made.
     */
    public function makeGuess($number)
    {
        if (($number < 1) || ($number > 100)) {
            throw new GuessException("Only numbers between 1 - 100");
        }

        if (($this->tries) > 0) {
            $this->tries--;
        } else {
            return 'No more tries. Start a new game.';
        }
        if ($number == $this->number) {
            return 'Correct';
        } elseif ($number < $this->number) {
            return "Too low";
        } elseif ($number > $this->number) {
            return "Too high";
        } else {
            return 'Imaginary numbers not allowed';
        }
    }



    /**
     * Constructor to initiate the object with current game settings,
     * if available. Randomize the number if no value is sent in.
     *
     * @param int $number The current secret number, default -1 to initiate
     *                    the number from start.
     * @param int $tries  Number of tries a guess has been made,
     *                    default 6.
     */
    public function __construct(int $number = -1, int $tries = 6)
    {
        if ($number > 0) {
            $this->number = $number;
        } else {
            $this->random();
        }

        $this->tries = $tries;

    }



    /**
     * Destroy game.
     */
    public function __destruct()
    {
        // echo __METHOD__;
    }
}
