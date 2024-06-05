<?php
define('FILE','loveIsAwful.txt');
define('CHARS_TO_CLEAN',['.',',',';','!','?']);

function cleanText(array $words): array {
    foreach($words as $key => $word) {
        $words[$key] = str_replace(CHARS_TO_CLEAN,'',$word);
    }
    return $words;
}

function printFirstLetterVowelWords(array $words): void {
    $pattern = '/\b[aeiouAEIOU]\w*/';
    foreach($words as $word) {
        if(preg_match($pattern, $word)) {
            echo $word.PHP_EOL;
        }
    }
}

function printGivenInitialCharWords(array $words,string $char): void {
    $pattern = '/\b\w*['.$char.','.strtoupper($char).']\w*\b/i';
    foreach($words as $word) {
        if(preg_match($pattern, $word)) {
            echo $word.PHP_EOL;
        }
    }
}

$file = fopen(FILE,"r");
$text = fread($file,filesize(FILE));
$words = explode(" ",$text);
$clean_words = cleanText($words);
printFirstLetterVowelWords($clean_words);
printGivenInitialCharWords($clean_words,"i")
?>