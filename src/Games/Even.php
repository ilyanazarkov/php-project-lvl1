<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\run;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function start(): void
{
    run(fn () => getGameData(), RULES);
}

/**
 * @return array<int, int|string>
 */
function getGameData(): array
{
    $number = getNumber();
    $answer = getCorrectAnswer(isEven($number));
    $question = "Question: $number";

    return [$question, $answer];
}

function getNumber(): int
{
    return rand(1, 100);
}

function isEven(int $num): bool
{
    return $num % 2 === 0;
}

function getCorrectAnswer(bool $isEven): string
{
    return $isEven ? 'yes' : 'no';
}
