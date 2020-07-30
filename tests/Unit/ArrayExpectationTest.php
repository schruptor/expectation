<?php
namespace Schruptor\Expectation\Tests;

use Schruptor\Expectation\Expectation;
use Schruptor\Expectation\ArrayExpectation;

beforeEach(function () {
    $this->array = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
});

it('asserts that an array return the ArrayExpectation', function () {
    assertTrue(Expectation::isThat($this->array) instanceof ArrayExpectation);
});

it('asserts that an array can be counted', function () {
    assertFalse(expect($this->array)->hasCount(2)->resolve());
    assertTrue(expect($this->array)->hasCount(3)->resolve());
});

it('asserts that array can be checked for a specific key', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->hasKey('a')
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->array)
            ->hasKey('z')
            ->resolve()
    );
});

it('asserts that array can be checked for specific keys', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->hasKeys(['a', 'b', 'c'])
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->array)
            ->hasKeys(['z', 'x', 'y'])
            ->resolve()
    );
});

it('asserts that array can be checked for a specific value', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->hasValue('B')
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->array)
            ->hasValue('X')
            ->resolve()
    );
});

it('asserts that array can be checked for specific values', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->hasValues(['A', 'B', 'C'])
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->array)
            ->hasValues(['Z', 'X', 'Y'])
            ->resolve()
    );
});

it('asserts that an array is exactly the same', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->is($this->array)
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->array)
            ->is(['a' => 'b'])
            ->resolve()
    );
});

it('asserts that an array is not exactly the same', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->isNot(['a' => 'b'])
            ->resolve()
    );
    assertFalse(
        Expectation::isThat($this->array)
            ->isNot($this->array)
            ->resolve()
    );
});