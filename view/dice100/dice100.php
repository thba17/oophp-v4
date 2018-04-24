<?php
namespace Anax\View;

/**
 * dice100.php - View for the game dice 100
 */

$isEnabled = isset($_POST['doDebug']) ? "checked='checked'" : null;
?>
<h1><?= $title ?></h1>

<p>You will be playing against the computer</p>

<div>
    <form method="POST">
        <fieldset style="width: 80%;">
            <legend>Number of dices (1-6): </legend>
            <input type="text" name="dices" style="margin: 1rem;" pattern="[1-6]"
                placeholder="<?=$dices;?>"
                <?=$_SESSION["game"]["disabled"];?> >
            <input type="submit" name="doSetDices" value="Submit" <?=$_SESSION["game"]["disabled"];?> >
            <input type="submit" name="doRestart" value="Restart"><br>
            <input type="checkbox" name="doDebug" value="doDebug" id="doDebug" style="margin: 0 1rem;" <?= $isEnabled ?> >
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
    Score Visitor:  <?=$_SESSION["game"]["Visitor"]["grandTotal"];?><br>
    Score Computer: <?=$_SESSION["game"]["Computer"]["grandTotal"];?>
</p>
<?php endif; ?>

<?php if (isset($_SESSION["game"]["winner"])) : ?>
    <h2>We have a winner: <?= $_SESSION["game"]["winner"]; ?> </h2>
    <!-- <p>Final score: <?= $_SESSION["game"][$player]["grandTotal"] + $_SESSION["game"][$player]["roundTotal"]; ?> -->
    <p>Final score: <?= $_SESSION["game"]["winnerTotal"]; ?>
<?php endif; ?>

<div style="float: left; width: 40%;">
    <?php if (!empty($_SESSION["game"]["Visitor"]["values"])) : ?>
    <h3>Visitor</h3>
    <p>
    <?php foreach ($_SESSION["game"]["Visitor"]["values"] as $key => $value) : ?>
        <i class="dice-sprite dice-<?= $value ?>"></i>
    <?php endforeach; ?>
    </p>

    <p><?= implode(", ", $_SESSION["game"]["Visitor"]["values"]) ?></p>
    <p>This throw: <?= $_SESSION["game"]["Visitor"]["roundSum"] ?>.</p>
    <p>Total round: <?= $_SESSION["game"]["Visitor"]["roundTotal"] ?>.</p>
    <?php endif; ?>
</div>

<div style="float: right; width: 40%;">
    <?php if (!empty($_SESSION["game"]["Computer"]["values"])) : ?>
    <h3>Computer</h3>
    <p>
    <?php foreach ($_SESSION["game"]["Computer"]["values"] as $key => $value) : ?>
        <i class="dice-sprite dice-<?= $value ?>"></i>
    <?php endforeach; ?>
    </p>

    <p><?= implode(", ", $_SESSION["game"]["Computer"]["values"]) ?></p>
    <p>This throw: <?= $_SESSION["game"]["Computer"]["roundSum"] ?>.</p>
    <p>Total round: <?= $_SESSION["game"]["Computer"]["roundTotal"] ?>.</p>
    <?php endif; ?>
</div>

<?php if (isset($_POST['doDebug'])) : ?>
<div style="clear: both;">
    <hr>
    <pre>
    <?php
        print_r($_SESSION);
    ?>
    </pre>
</div>
<?php endif; ?>
