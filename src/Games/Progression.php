<?php

namespace Brain\Games\Games;

use Brain\Games\Engine;

class Progression extends Engine
{
    public function startGame()
    {
        $this->greetings();
        $this->sayGameRuleset('What number is missing in the progression?');

        do {
            $range = $this->getProgressionRange();

            $hideNumKey = array_rand($range);
            $correctAnswer = (string) $range[$hideNumKey];
            $range[$hideNumKey] = "..";

            $progression = implode(" ", $range);

            $question = "Question: $progression";

            $result = $this->askQuestion($question, $correctAnswer);
        } while ($result);
    }

    private function getProgressionRange()
    {
        $numbers = rand(5, 15);

        $start = rand(0, 30);
        $step = rand(1, 10);
        $end = $start + $step * $numbers;

        $range = range($start, $end, $step);

        return $range;
    }
}
