<?php

use Schruptor\Expectation\Expectation;

function expect($expected) : Expectation
{
    return Expectation::isThat($expected);
}