<?php

namespace Brain\Games\Engine;

use function cli\line as cline;
use function cli\prompt as cprompt;

define("CORRECT_ANSWERS_TO_WIN", 3);
define("PROMPT_DEFAULT_VALUE", false);
define("PROMPT_MARKER", " ");

function line(string $text): void
{
    cline($text);
}

function prompt(string $text): string
{
    return cprompt($text, PROMPT_DEFAULT_VALUE, PROMPT_MARKER);
}

function greetings(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");

    return $name;
}

function sayGameRuleset(string $gameRuleset): void
{
    line($gameRuleset);
}

function askQuestion(string $question, string $correctAnswer, int &$correctAnswers, string $name): bool
{
    line($question);
    $answer = prompt('Your answer:');

    $isAnswerCorrect = $answer === $correctAnswer;

    if (!$isAnswerCorrect) {
        line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
        line("Let's try again, $name!");

        return false;
    }

    line("Correct!");
    $correctAnswers += 1;

    if (isPlayerWin($correctAnswers)) {
        line("Congratulations, $name!");
        return false;
    }

    return true;
}

function isPlayerWin($correctAnswers)
{
    return $correctAnswers === CORRECT_ANSWERS_TO_WIN;
}
