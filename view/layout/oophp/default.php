<?php

namespace Anax\View;

/**
 * A layout rendering views in defined regions.
 */

// Show incoming variables and view helper functions
//echo showEnvironment(get_defined_vars(), get_defined_functions());

?><!doctype html>
<html>
<head lang="sv">
    <meta charset="utf-8">
    <title><?= $title ?? "No title" ?></title>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <!-- Bootstrap stylesheet -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<?php if (isset($favicon)) : ?>
    <link rel="icon" href="<?= $favicon ?>">
<?php endif; ?>

<?php foreach ($stylesheets as $stylesheet) : ?>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link rel="stylesheet" type="text/css" href="<?= asset($stylesheet) ?>">
<?php endforeach; ?>

</head>
<body>

<!-- header -->
<?php if (regionHasContent("header")) : ?>
<!-- <div class="outer-wrap outer-wrap-header"> -->
<!-- Added container for bootstrap -->
<div class="outer-wrap outer-wrap-header container">
    <div class="inner-wrap inner-wrap-header">
        <div class="row">
            <div class="wrap-header">
                <?php renderRegion("header") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- navbar -->
<?php if (regionHasContent("navbar")) : ?>
<div class="outer-wrap outer-wrap-navbar">
    <div class="inner-wrap inner-wrap-navbar">
        <div class="row">
            <div class="wrap-navbar">
                <?php renderRegion("navbar") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- main -->
<?php if (regionHasContent("main")) : ?>
<div class="outer-wrap outer-wrap-main">
    <div class="inner-wrap inner-wrap-main">
        <div class="row">
            <main class="wrap-main">
                <?php renderRegion("main") ?>
            </main>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- footer -->
<?php if (regionHasContent("footer")) : ?>
<div class="outer-wrap outer-wrap-footer">
    <div class="inner-wrap inner-wrap-footer">
        <div class="row">
            <div class="wrap-footer">
                <?php renderRegion("footer") ?>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<?php foreach ($javascripts as $javascript) : ?>
<script async src="<?= asset($javascript) ?>"></script>
<?php endforeach; ?>
<!-- Bootstrap JavaScript plugins -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
