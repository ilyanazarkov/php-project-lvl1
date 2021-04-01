<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;
use Brain\Games\Helper;

class Gcd extends Engine
{
    public function startGame()
    {
        $this->greetings();
        $this->sayGameRuleset('Find the greatest common divisor of given numbers.');

        do {
            $num1 = rand(0, 100);
            $num2 = rand(0, 100);

            $question = "Question: $num1 $num2";
            $correctAnswer = (string) Helper::gcd($num1, $num2);

            $result = $this->askQuestion($question, $correctAnswer);
        } while ($result);
    }
}
