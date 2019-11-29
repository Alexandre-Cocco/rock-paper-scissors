<?php
const SCISSORS = 'scissors';
const PAPER = 'paper';
const ROCK = 'rock';

const EVAL_GAME = [
    SCISSORS => [
        SCISSORS => 'tied',
        PAPER => 'win',
        ROCK => 'lose',
    ],
    PAPER => [
        SCISSORS => 'lose',
        PAPER => 'tied',
        ROCK => 'win',
    ],
    ROCK => [
        SCISSORS => 'win',
        PAPER => 'lose',
        ROCK => 'tied',
    ],
];

?>