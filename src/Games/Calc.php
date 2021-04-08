<?php

namespace Brain\Games\Games\Calc;

use function Brain\Games\Engine\greetings;
use function Brain\Games\Engine\sayGameRuleset;
use function Brain\Games\Engine\askQuestion;
use function Brain\Games\Helper\calc;

function run(): void
{
    $name = greetings();
    sayGameRuleset('What is the result of the expression?');

    $correctAnswers = 0;

    do {
        $num1 = rand(0, 100);
        $num2 = rand(0, 100);
        $operations = ["+", "-", "*"];

        $operation = $operations[array_rand($operations)];

        $question = "Question: $num1 $operation $num2";
        $correctAnswer = (string) calc($operation, $num1, $num2);

        $result = askQuestion($question, $correctAnswer, $correctAnswers, $name);
    } while ($result);
}
