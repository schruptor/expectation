<?php

use Schruptor\Expectation\Expectation;
use Schruptor\Expectation\StringExpectation;
use function Schruptor\expect;

beforeEach(function () {
    $this->string = 'Testing';
    $this->stringLenght = strlen($this->string);
    $this->word = 'Test';
    $this->wordLenght = strlen($this->word);
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

it('asserts that stings is longer', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->toBeLongerThan($this->wordLenght)
            ->resolve()
    );
});

it('asserts that stings is shorter', function (){
    assertTrue(
        Expectation::isThat($this->word)
            ->toBeShorterThan($this->stringLenght)
            ->resolve()
    );
});

it('asserts that stings is longer or equal', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->toBeLongerOrEqualThan($this->wordLenght)
            ->resolve()
    );

    assertTrue(
        Expectation::isThat($this->string)
            ->toBeLongerOrEqualThan($this->stringLenght)
            ->resolve()
    );
});

it('asserts that stings is shorter or equal', function (){
    assertTrue(
        Expectation::isThat($this->word)
            ->toBeShorterOrEqualThan($this->stringLenght)
            ->resolve()
    );

    assertTrue(
        Expectation::isThat($this->word)
            ->toBeShorterOrEqualThan($this->wordLenght)
            ->resolve()
    );
});

it('asserts that stings is equal in lenght', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->lengthIs($this->stringLenght)
            ->resolve()
    );
});