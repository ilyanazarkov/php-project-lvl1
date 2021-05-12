<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const RULES = 'What is the result of the expression?';

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
    $operation = getOperation();

    $question = "Question: $number1 $operation $number2";
    $answer = (string) calc($operation, $number1, $number2);

    return [$question, $answer];
}

function getNumber(): int
{
    return rand(1, 100);
}

function getOperation(): string
{
    $operations = ["+", "-", "*"];
    return $operations[array_rand($operations)];
}

function calc(string $operation, int $num1, int $num2): int
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
            $result = 0;
            break;
    }

    return $result;
}
