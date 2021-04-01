<?php

namespace Brain\Games;

use function cli\line;
use function cli\prompt;

abstract class Engine
{
    protected const CORRECT_ANSWERS_TO_WIN = 3;
    protected const PROMPT_DEFAULT_VALUE = false;
    protected const PROMPT_MARKER = " ";

    protected $name = "";
    protected $correctAnswers = 0;

    protected static function line($text)
    {
        line($text);
    }

    protected static function prompt($text)
    {
        return prompt($text, self::PROMPT_DEFAULT_VALUE, self::PROMPT_MARKER);
    }

    protected function greetings()
    {
        self::line('Welcome to the Brain Games!');
        $this->name = self::prompt('May I have your name?');
        self::line("Hello, {$this->name}!");
    }

    protected function sayGameRuleset($gameRuleset)
    {
        line($gameRuleset);
    }

    protected function askQuestion($question, $correctAnswer)
    {
        self::line("Question: $question");
        $answer = self::prompt('Your answer:');

        $isAnswerCorrect = $answer === $correctAnswer;

        if (!$isAnswerCorrect) {
            self::line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.");
            self::line("Let's try again, {$this->name}!");

            return false;
        }

        self::line("Correct!");
        $this->correctAnswers++;

        if ($this->isPlayerWin()) {
            self::line("Congratulations, {$this->name}!");
            return false;
        }

        return true;
    }

    protected function isPlayerWin()
    {
        return $this->correctAnswers === self::CORRECT_ANSWERS_TO_WIN;
    }
}
