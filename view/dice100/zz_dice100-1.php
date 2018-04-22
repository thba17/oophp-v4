<?php
namespace Anax\View;

/**
 * dice100.php - View for the game dice 100
 */

?>
<h1><?= $title ?></h1>

<p>You will be playing against the computer</p>

<div>
    <form method="POST">
        <fieldset style="width: 80%;">
            <legend>Number of dices: </legend>
            <input type="text" name="dices" style="margin: 1rem;" placeholder="<?=$dices;?>" <?=$_SESSION["game"]["disabled"];?> >
            <input type="submit" name="doSetDices" value="Submit" <?=$_SESSION["game"]["disabled"];?> >
            <input type="submit" name="doRestart" value="Restart"><br>
            <input type="checkbox" name="doDebug" value="doDebug" id="doDebug" style="margin: 0 1rem;" <?php if(isset($_POST['doDebug'])) echo "checked='checked'"; ?> >
            <label for="doDebug">Debug $_SESSION</label>
        </fieldset>
<?php if ($game !== null) : ?>
        <fieldset style="width: 80%;">
            <legend><?= $_SESSION["game"]["player"] ?>: Lets play</legend>
            <input type="submit" name="doThrow" value="Throw" <?= $_SESSION["game"]["stopGame"];?> >
            <input type="submit" name="doStop" value="Stop" <?= $_SESSION["game"]["stopGame"];?> >
        </fieldset>
<?php endif; ?>
    </form>
</div>

<?php if (isset($_SESSION["game"]["player"])) : ?>
<p>
    Score Visitor:  <?=$_SESSION["game"]["Visitor"]["total"];?><br>
    Score Computer: <?=$_SESSION["game"]["Computer"]["total"];?>
</p>
<?php endif; ?>

<?php if (isset($_SESSION["game"]["winner"])) : ?>
    <h2>We have a winner: <?= $_SESSION["game"]["winner"]; ?> </h2>
    <p>Final score: <?= $_SESSION["game"][$player]["total"] + $_SESSION["game"][$player]["round"]; ?>
<?php endif; ?>

<?php if (!empty($class)) : ?>
<h2>Rolling dices</h2>
<p>
<?php foreach($class as $key => $value) : ?>
    <i class="dice-sprite dice-<?= $value ?>"></i>
<?php endforeach; ?>
</p>


<p><?= implode(", ", $class) ?></p>
<p>This round: <?= $_SESSION["game"][$player]["round"] ?>.</p>
<p>Total score: <?= $_SESSION["game"][$player]["total"] ?>.</p>
<?php endif; ?>

<?php if(isset($_POST['doDebug'])) : ?>
    <pre>
    <?php
        print_r($_SESSION);
    ?>
    </pre>
<?php endif; ?>
