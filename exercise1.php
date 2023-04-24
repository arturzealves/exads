<?php

function getMultiples($number): array
{
    $multiples = [];
    for ($i = 2; $i < $number; $i++) {
        if ($number % $i == 0) {
            $multiples[] = $i;
        }
    }

    return $multiples;
}

$numbers = range(1, 100);
$result = array_map(function ($number) {
    $multiples = getMultiples($number);

    if ($number == 1) {
        return $number;
    }

    return empty($multiples)
        ? $number . ' [PRIME]'
        : sprintf('%s (%s)', $number, implode(',', $multiples));
}, $numbers);

echo implode("\n", $result) . "\n";
