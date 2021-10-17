<?php

function run(int $N, int $M): ?string {
    /*
    * Write your code below; return type and arguments should be according to the problem\'s requirements
    */

    $sequence = null;

    // Only process if $N <= $M. Otherwise, return null
    if ($N <= $M) {
        // Set up function for array_map.
        // For multiples of three give "Fizz" instead of the number.
        // For the multiples of five give "Buzz".
        // For numbers which are multiples of both three and five, give "FizzBuzz".
        $func = function(int $i) {
            if (($i % 3) == 0) {
                if (($i % 5) == 0) {
                    return 'FizzBuzz';
                } else {
                    return 'Fizz';
                }
            } elseif (($i % 5) == 0) {
                return 'Buzz';
            } else {
                return $i;
            }
        };

        // Use range function to create the array and apply array_map with above function
        $numbers = array_map($func, range($N, $M));

        // Set the result string with implode
        $sequence = implode(',', $numbers);
    }

    return $sequence;
}
