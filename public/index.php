<?php
/*
Esta versão utiliza o Crivo de Eratóstenes para encontrar todos os números primos 
dentro do intervalo especificado de forma mais eficiente do que a abordagem anterior. 
Isso melhora o desempenho, especialmente para intervalos maiores, 
reduzindo a complexidade do algoritmo de O(n log log n) para O(n). 
*/

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
$end = 1500;
$result = sumOfPrimesInRange($start, $end);

echo "Soma dos números primos entre $start e $end é: $result";