<?php

use Schruptor\Expectation\Expectation;
use Schruptor\Expectation\StringExpectation;

beforeEach(function () {
    $this->string = 'Testing';
    $this->word = 'Test';
});

it('asserts that a string return the StringExpectation', function () {
    assertInstanceOf(StringExpectation::class, Expectation::isThat($this->string));
});

it('asserts that stings can contain other strings', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->contains($this->word)
            ->resolve()
    );
});