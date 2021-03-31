<?php

namespace Brain\Games\Even;

use function cli\line;
use function cli\prompt;

function startGame()
{
    $promptDefaultValue = false;
    $promptMarker = " ";

    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', $promptDefaultValue, $promptMarker);
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswers = 0;
    $correctAnswersToWin = 3;

    do {
        $num = rand(0, 100);
        line("Question: $num");
        $answer = prompt('Your answer:', $promptDefaultValue, $promptMarker);

        $correctAnswer = isEven($num) ? "yes" : "no";

        if ($answer === $correctAnswer) {
            line("Correct!");
            $correctAnswers++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            line("Let's try again, %s!", $name);

            return;
        }


        if ($correctAnswers === $correctAnswersToWin) {
            line("Congratulations, %s!", $name);
            return;
        }
    } while (true);
}

function isEven($num)
{
    return $num % 2 === 0;
}
