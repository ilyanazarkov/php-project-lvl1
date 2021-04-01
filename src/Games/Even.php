<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;
use Brain\Games\Helper;

class Even extends Engine
{
    public function startGame()
    {
        //TODO: @author Ilya Nazarkov, comment: delete debug
        echo "<pre>";
        print_r(Helper::gcd(100, 48));
        echo "</pre>";

        $this->greetings();
        $this->sayGameRuleset('Answer "yes" if the number is even, otherwise answer "no".');

        do {
            $num = rand(0, 100);

            $question = "Question: $num";
            $correctAnswer = Helper::isEven($num) ? "yes" : "no";

            $result = $this->askQuestion($question, $correctAnswer);
        } while ($result);
    }
}
