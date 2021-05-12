<?php

namespace BrainGames\Games\Gcd;

use function BrainGames\Engine\run;

const RULES = 'Find the greatest common divisor of given numbers.';

function start(): void
{
    run(fn () => getGameData(), RULES);
}

/**
 * @return array<int, string>
 */
function getGameData(): array
{
    $number1 = getNumber();
    $number2 = getNumber();

    $question = "Question: $number1 $number2";
    $answer = (string) gcd($number1, $number2);

    return [$question, $answer];
}

function getNumber(): int
{
    return rand(1, 100);
}

function gcd(int $a, int $b): int
{
    return (bool)$b ? gcd($b, $a % $b) : $a;
}
