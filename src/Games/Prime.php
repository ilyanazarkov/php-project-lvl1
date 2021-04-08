<?php

namespace Brain\Games\Games\Prime;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\sayGameRuleset;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Helper\isPrime;

function run(): void
{
    $name = greetings();
    sayGameRuleset('Answer "yes" if given number is prime. Otherwise answer "no".');

    $correctAnswers = 0;

    do {
        $num = rand(0, 1000);

        $question = "Question: $num";
        $correctAnswer = isPrime($num) ? "yes" : "no";

        $result = askQuestion($question, $correctAnswer, $correctAnswers, $name);
    } while ($result);
}
