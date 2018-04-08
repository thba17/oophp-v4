<?php

namespace Anax\View;

/**
 * Template file to render a view.
 */

// Show incoming variables and view helper functions
// echo showEnvironment(get_defined_vars(), get_defined_functions());

?>

<?php
$numFiles   = count(get_included_files());
$memoryUsed = memory_get_peak_usage(true);
$loadTime   = microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'];
?>
<p>
    Validatorer:
    <a href="http://validator.w3.org/check/referer">HTML5</a>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    <a href="http://validator.w3.org/unicorn/check?ucn_uri=referer&amp;ucn_task=conformance">Unicorn</a>
</p>
<p>
    Specifikationer:
    <a href="http://www.w3.org/TR/html4" target="_blank">HTML4</a>
    <a href="http://www.w3.org/TR/html5" target="_blank">HTML5</a>
    <a href="http://www.w3.org/TR/CSS21" target="_blank">CSS2.1</a>
    <a href="http://dev.w3.org/csswg/css2" target="_blank">CSS2.2</a>
    <a href="http://www.w3.org/Style/CSS/current-work" target="_blank">CSS3</a>
</p>
<p>
    Cheatsheat:
    <a href="http://www.w3.org/2009/cheatsheet" target="_blank">W3C Cheatsheet</a>
</p>
<p>
    Time to load page: <?=round($loadTime*1000, 4)?> ms. Files included: <?=$numFiles?>. Memory used: <?=round($memoryUsed/1000000, 2)?>MB.
</p>
