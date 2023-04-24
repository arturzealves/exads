<?php

// Array with ASCII characters from comma to pipe
$asciiArray = range(',', '|');

// Removing a random element
$randomIndex = array_rand($asciiArray);
$removedElement = $asciiArray[$randomIndex];
unset($asciiArray[$randomIndex]);

// Calculate the sum of all remaining ASCII elements in the array
$asciiSum = array_reduce($asciiArray, function ($sum, $char) {
    return $sum + ord($char);
}, 0);

// Calculate the ASCII value of the missing character
$missingAsciiValue = 0;
foreach ($asciiArray as $char) {
    $missingAsciiValue += ord($char);
}
$missingAsciiValue -= ord($removedElement);

// Calculate the missing character from ASCII value
$missingCharacter = chr($asciiSum - $missingAsciiValue);

echo sprintf("The removed character was %s and the missing character is %s\n", $removedElement, $missingCharacter);
