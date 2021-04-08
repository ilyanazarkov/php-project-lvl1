<?php

namespace Brain\Games\Helper;

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function calc(string $operation, int $num1, int $num2)
{
    switch ($operation) {
        case '+':
            $result = $num1 + $num2;
            break;
        case '-':
            $result = $num1 - $num2;
            break;
        case '*':
            $result = $num1 * $num2;
            break;
        default:
            $result = false;
            break;
    }

    return $result;
}

function gcd(int $a, int $b): int
{
    return $b ? gcd($b, $a % $b) : $a;
}

/**
 * @param $num
 * @return bool
 * @link https://en.wikipedia.org/wiki/Primality_test
 */
function isPrime(int $num): bool
{
    if ($num <= 3) {
        return $num > 1;
    }

    if ($num % 2 === 0 || $num % 3 === 0) {
        return false;
    }

    $count = 5;


    while ($count ** 2 <= $num) {
        if ($num % $count === 0 || $num % ($count + 2) === 0) {
            return false;
        }

        $count += 6;
    }

    return true;
}
