<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;
use Brain\Games\Helper;

class Calc extends Engine
{
    public function startGame()
    {
        $this->greetings();
        $this->sayGameRuleset('What is the result of the expression?');

        do {
            $num1 = rand(0, 100);
            $num2 = rand(0, 100);
            $operations = ["+", "-", "*"];

            $operation = $operations[array_rand($operations)];

            $question = "Question: $num1 $operation $num2";
            $correctAnswer = (string) Helper::doMath($num1, $num2, $operation);

            $result = $this->askQuestion($question, $correctAnswer);
        } while ($result);
    }
}
