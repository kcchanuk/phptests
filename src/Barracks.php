<?php
function run(int $n, int $k): ?int
{
    /*
    * Write your code below; return type and arguments should be according to the problem\'s requirements
    */

    /*
     * Soldiers really like sleeping and resting. n soldiers settle in k barracks following this set of rules:
     *
     * soldiers come one at a time from 1 to n;
     *
     * each soldier chooses the most empty barrack available.
     * If he can choose from more than one equally empty barracks, he chooses one of them randomly;
     *
     * Your job is to find how many possible ways the soldiers can settle in barracks for a given pair (n, k).
     * Two ways are considered distinct if at least one of the barracks has different soldiers.
     * To make things easier, return the result modulo 1000000007
     *
     * CONSTRAINTS
     * 1 <= n <= 10^18
     * 1 <= k <= 10 ^ 6
     */

    $nr_ways = null;

    // Calculate the result with recursion
    $nr_ways = calculate($n, $k) % 1000000007;

    return $nr_ways;
}

/*
 * The function to calculate the result recursively
 */
function calculate($n, $k) {
    if ($n == 1) {
        // There is only 1 solider, so he can go to $k barracks
        return $k;
    } elseif ($k == 1) {
        // There is only 1 barrack, so all soliders can only go to 1 barrack
        return 1;
    } elseif ($n == $k) {
        // The number of soldiers and the number of barracks are the same. So the possible combination is n!
        // e.g. 1st soldier can go to $k barracks,
        // 2nd soldier can go to ($k - 1) barracks,
        // 3rd solider can go to ($k - 2) barracks and so on
        return factorial($k);
    } elseif ($n > $k) {
        // There are more soldiers than barracks
        // The number of combinations is k! (which has served k soldiers already) multiplied by
        // the number of combinations to serve the rest of the soldiers (n - k soldiers)
        return factorial($k) * calculate($n - $k, $k);
    } else {
        // $n < $k
        // There are more barracks than soldiers
        // So the number of combinations is only e.g. there are 3 soldiers and so we have "k x (k-1) x (k-2)"
        $temp_result = 1;
        $temp_k = $k;
        for ($x = 0; $x < $n; $x++) {
            $temp_result = $temp_result * $temp_k;
            $temp_k--;
        }
        return $temp_result;
    }
}

/*
 * Factorial Function
 */
function factorial($num) {
    $factorial = 1;
    for ($x = $num; $x >= 1; $x--)
    {
        $factorial = $factorial * $x;
    }
    return $factorial;
}

echo run(20, 3);