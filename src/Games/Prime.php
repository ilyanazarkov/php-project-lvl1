<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;
use Brain\Games\Helper;

class Prime extends Engine
{
    public function startGame()
    {
        $this->greetings();
        $this->sayGameRuleset('Answer "yes" if given number is prime. Otherwise answer "no".');

        do {
            $num = rand(0, 1000);

            $question = "Question: $num";
            $correctAnswer = Helper::isPrime($num) ? "yes" : "no";

            $result = $this->askQuestion($question, $correctAnswer);
        } while ($result);
    }
}
