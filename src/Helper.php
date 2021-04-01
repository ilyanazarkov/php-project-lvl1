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
}
