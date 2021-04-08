<?php

namespace Brain\Games\Cli;

use function cli\line;
use function cli\prompt;

function greetings(): void
{
    line('Welcome to the Brain Game!');
    $name = prompt('May I have your name?', false, ' ');
    line("Hello, $name!");
}
