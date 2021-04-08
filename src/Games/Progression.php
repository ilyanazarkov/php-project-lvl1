<?php

namespace Brain\Games\Games\Progression;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\sayGameRuleset;
use function Brain\Games\Engine\askQuestion;

function run(): void
{
    $name = greetings();
    sayGameRuleset('What number is missing in the progression?');

    $correctAnswers = 0;

    do {
        $range = getProgressionRange();

        $hideNumKey = array_rand($range);
        $correctAnswer = (string) $range[$hideNumKey];
        $range[$hideNumKey] = "..";

        $progression = implode(" ", $range);

        $question = "Question: $progression";
        $result = askQuestion($question, $correctAnswer, $correctAnswers, $name);
    } while ($result);
}

/** @return array<int> */
function getProgressionRange(): array
{
    $numbers = rand(5, 15);

    $start = rand(0, 30);
    $step = rand(1, 10);
    $end = $start + $step * $numbers;

    $range = range($start, $end, $step);

    return $range;
}
