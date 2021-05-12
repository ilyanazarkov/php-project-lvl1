<?php

namespace BrainGames\Engine;

use function cli\line as cline;
use function cli\prompt as cprompt;

define("CORRECT_ANSWERS_TO_WIN", 3);
define("PROMPT_DEFAULT_VALUE", "");
define("PROMPT_MARKER", " ");

function run(callable $getGameData, string $rules): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, $name!");
    line($rules);

    $correctAnswers = 0;

    do {
        [$question, $answer] = $getGameData();

        $result = askQuestion($question, $answer, $correctAnswers, $name);
    } while ($result);
}

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

function isPlayerWin(int $correctAnswers): bool
{
    return $correctAnswers === CORRECT_ANSWERS_TO_WIN;
}

/*
 * namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const MAX_ROUNDS_COUNT = 3;

function run(callable $getGameData, string $question): void
{
    line('Welcome to the Brain Game!');
    $playerName = prompt('May I have your name?');
    line("Hello, %s!", $playerName);

    line($question);

    for ($i = 0; $i < MAX_ROUNDS_COUNT; $i++) {
        [$question, $answer] = $getGameData();
        line("Question: $question");
        $playerAnswer = prompt('Your answer', '');

        if ($playerAnswer === $answer) {
            line('Correct!');
        } else {
            line("'{$playerAnswer}' is wrong answer ;(. Correct answer was '{$answer}'.");
            line("Let's try again, {$playerName}!");
            return;
        }
    }

    line("Congratulations, $playerName!");
}
*/
