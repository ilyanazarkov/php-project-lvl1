<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\run;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function start(): void
{
    run(fn () => getGameData(), RULES);
}

/**
 * @return array<int, string>
 */
function getGameData(): array
{
    $number = getNumber();

    $question = "Question: $number";
    $answer = getCorrectAnswer(isPrime($number));

    return [$question, $answer];
}

function getNumber(): int
{
    return rand(0, 1000);
}

function isPrime(int $num): bool
{
    if ($num == 2 || $num == 3) {
        return true;
    }

    if ($num % 2 === 0 || $num % 3 === 0) {
        return false;
    }

    $divisor = 5;

    while ($divisor ** 2 <= $num) {
        if ($num % $divisor === 0 || $num % ($divisor + 2) === 0) {
            return false;
        }

        $divisor += 6;
    }

    return true;
}

function getCorrectAnswer(bool $isPrime): string
{
    return $isPrime ? 'yes' : 'no';
}
