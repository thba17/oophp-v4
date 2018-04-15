<?php
    $title = "Guess my number | POST | oophp";
    require __DIR__ . '/../incl/header.php';
?>

<p>Guess a number between 1 and 100. You have <?=$game->tries();?> tries left.</p>
<div>
    <form method="POST">
        <fieldset style="width: 40%;">
            <legend>Enter your number below: </legend>
            <input type="hidden" name="tries" value="<?=$game->tries();?>" />
            <input type="hidden" name="number" value="<?=$game->number();?>" />
            <input type="text" name="guess" style="margin: 1rem;" placeholder="Number">
            <input type="submit" name="doGuess" value="Guess">
            <input type="submit" name="doRestart" value="Restart">
            <input type="submit" name="doCheat" value="Cheat">
        </fieldset>
    </form>
</div>

<?php
// Check if user request correct answer
if (isset($_POST['doGuess'])) {
    echo "$res";
}

if (isset($_POST['doCheat'])) {
    echo "Try this number: " . $game->number();
}
?>


<?php
    require __DIR__ . '/../incl/footer.php';
?>
