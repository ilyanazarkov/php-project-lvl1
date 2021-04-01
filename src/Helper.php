<?php

namespace Brain\Games;

class Helper
{
    public static function isEven($num)
    {
        return $num % 2 === 0;
    }

    public static function doMath($num1, $num2, $operation)
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

    public static function gcd($a, $b)
    {
        return $b ? self::gcd($b, $a % $b) : $a;
    }

    /**
     * @param $num
     * @return bool
     * @link https://en.wikipedia.org/wiki/Primality_test
     */
    public static function isPrime($num)
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
}
