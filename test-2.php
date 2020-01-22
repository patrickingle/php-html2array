<?php
require 'php-html2array.php';

$results = html2array("https://www.britannica.com/list/browse","div","class","grid grid-gutters-xs");

echo '<pre>'; print_r($results); echo '</pre>';