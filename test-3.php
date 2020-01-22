<?php
require 'php-html2array.php';

$results = html2array("https://www.goodreads.com/list","div","class","cell");

echo '<pre>'; print_r($results); echo '</pre>';