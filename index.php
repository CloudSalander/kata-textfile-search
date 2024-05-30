<?php
define('FILE','loveIsAwful.txt');
define('CHARS_TO_CLEAN',['.',',',';','!','?']);

function cleanText(array $words): array {
    
    foreach($words as $key => $word) {
        $words[$key] = str_replace(CHARS_TO_CLEAN,'',$word);
    }
    return $words;
}

$file = fopen(FILE,"r");
$text = fread($file,filesize(FILE));
$words = explode(" ",$text);
$clean_words = cleanText($words);
var_dump($clean_words);
?>