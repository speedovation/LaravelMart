<?php

include("Parsedown.php");

$Parsedown = new Parsedown();

$data = file_get_contents('readme.md');

echo $Parsedown->text($data); 
