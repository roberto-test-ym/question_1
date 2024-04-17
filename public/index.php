<?php

function sumOfPrimesInRange($start, $end) {
    // Initializes an array to check whether a number is prime or not
    $isPrime = array_fill(0, $end + 1, true);
    $isPrime[0] = $isPrime[1] = false; // 0 and 1 are not primes

    // Find prime numbers using the Sieve of Eratosthenes
    for ($i = 2; $i * $i <= $end; $i++) {
        if ($isPrime[$i]) {
            for ($j = $i * $i; $j <= $end; $j += $i) {
                $isPrime[$j] = false;
            }
        }
    }

    // Sums prime numbers within the specified range
    $sum = 0;
    for ($i = $start; $i <= $end; $i++) {
        if ($isPrime[$i]) {
            $sum += $i;
        }
    }
    return $sum;
}

$start = 1;
$end = 1000;

$result = sumOfPrimesInRange($start, $end);
echo "Soma dos números primos entre $start e $end é: $result";