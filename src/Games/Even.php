<?php

namespace Brain\Games\Games\Even;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\sayGameRuleset;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Helper\isEven;

function run(): void
{
    $name = greetings();
    sayGameRuleset('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswers = 0;

    do {
        $num = rand(0, 100);

        $question = "Question: $num";
        $correctAnswer = isEven($num) ? "yes" : "no";

        $result = askQuestion($question, $correctAnswer, $correctAnswers, $name);
    } while ($result);
}
