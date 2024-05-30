<?php
define('FILE','loveIsAwful.txt');

$file = fopen(FILE,"r");
$text = fread($file,filesize(FILE));
var_dump(explode(" ",$text));

?>