<?php

//array to string with count vowels and reverse string 

$string = ["Hello", "World", "PHP", "Programming"]; //array

//foreach loop into array

foreach ($string as $word) {

    // Reset the counter for each word

    $count_vowels = 0;

    //checking for vowels
    for ($i = 0; $i < strlen($word); $i++) {
        if (in_array($word[$i], ['a', 'e', 'i', 'o', 'u', 'A', 'E', 'I', 'O', 'U'])) {
            $count_vowels++;
        }
    }

    // Display the result
    echo "\n Original String : $word ,Vowel Count : $count_vowels, Reversed String : " . strrev($word) . "\n";
    echo "-------------------------------------------------------------------\n";
}
