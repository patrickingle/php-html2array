<?php
require 'php-html2array.php';

$url = "https://listverse.com/";

$articles = html2array($url,"article","","");
echo '<pre>'; print_r($articles); echo '</pre>';