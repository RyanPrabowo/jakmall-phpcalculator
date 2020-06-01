<?php

function getOperator($command): string
{
    switch ($command) {
        case 'subtract':
            $operator = '-';
            break;
        case 'multiply':
            $operator = '*';
            break;
        default:
            $operator = '+';
            break;
    }
    return $operator;
}

function calc($input)
{
    $mathString = "return (".$input.");";
    $result = eval($mathString);
    return $result;
}
