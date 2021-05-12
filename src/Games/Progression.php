<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\run;

const RULES = 'What number is missing in the progression?';

function start(): void
{
    run(fn () => getGameData(), RULES);
}

/**
 * @return array<int, int|string>
 */
function getGameData(): array
{
    $range = getProgressionRange();
    [$hiddenNumber, $progression] = hideProgressionNumber($range);

    $question = "Question: $progression";
    $answer = $hiddenNumber;

    return [$question, $answer];
}

/** @return array<int, int> */
function getProgressionRange(): array
{
    $numbers = getNumbersCount();

    $start = getStartNumber();
    $step = getStep();
    $end = $start + $step * $numbers;

    $range = range($start, $end, $step);

    return $range;
}

function getNumbersCount(): int
{
    return rand(5, 15);
}

function getStartNumber(): int
{
    return rand(0, 30);
}

function getStep(): int
{
    return rand(1, 10);
}

/**
 * @param array<int, int> $range
 * @return array<int, int|string>
 */
function hideProgressionNumber(array $range): array
{
    $hideNumberKey = array_rand($range);
    $hiddenNumber = (string)$range[$hideNumberKey];
    $range[$hideNumberKey] = "..";
    $progression = implode(" ", $range);

    return [$hiddenNumber, $progression];
}
