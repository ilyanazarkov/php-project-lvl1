<?php

namespace Brain\Games\Games\Gcd;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\sayGameRuleset;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Helper\gcd;

function run(): void
{
    $name = greetings();
    sayGameRuleset('Find the greatest common divisor of given numbers.');

    $correctAnswers = 0;

    do {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);

        $question = "Question: $num1 $num2";
        $correctAnswer = (string) gcd($num1, $num2);

        $result = askQuestion($question, $correctAnswer, $correctAnswers, $name);
    } while ($result);
}
