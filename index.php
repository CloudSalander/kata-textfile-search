<?php
define('FILE','loveIsAwful.txt');
define('CHARS_TO_CLEAN',['.',',',';','!','?']);

function cleanText(array $words): array {
    foreach($words as $key => $word) {
        $words[$key] = str_replace(CHARS_TO_CLEAN,'',$word);
    }
    return $words;
}

function filterFirstLetterVowelWords(array $words): array {
    $pattern = '/\b[aeiouAEIOU]\w*/';
    $filtered_words = [];
    foreach($words as $word) {
        if(preg_match($pattern, $word)) {
            if(!in_array($word,$filtered_words)) $filtered_words[] = $word;
        }
    }
    return $filtered_words;
}

function filterGivenInitialCharWords(array $words,string $char): array {
    $pattern = '/\b\w*['.$char.','.strtoupper($char).']\w*\b/i';
    $filtered_words = [];
    foreach($words as $word) {
        if(preg_match($pattern, $word)) {
            if(!in_array($word,$filtered_words)) $filtered_words[] = $word;
        }
    }
    return $filtered_words;
}

function printFilteredWords(array $filtered_words): void {
    foreach($filtered_words as $word) {
        echo $word.PHP_EOL;
    }
}

$file = fopen(FILE,"r");
$text = fread($file,filesize(FILE));
$words = explode(" ",$text);
$clean_words = cleanText($words);
$vowel_words = filterFirstLetterVowelWords($clean_words);
$t_words = filterGivenInitialCharWords($clean_words,"t");

printFilteredWords($t_words);
?>