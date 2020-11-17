<?php
namespace Schruptor\Expectation\Tests;

use Schruptor\Expectation\Expectation;
use Schruptor\Expectation\ArrayExpectation;
use function Schruptor\expect;

beforeEach(function () {
    $this->array = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
});

it('asserts that the expectation returns the ArrayExpectation when given an array', function () {
    assertTrue(Expectation::isThat($this->array) instanceof ArrayExpectation);
});

it('asserts that an array can be counted and count is equal', function () {
    assertFalse(expect($this->array)->hasCount(2)->resolve());
    assertTrue(expect($this->array)->hasCount(3)->resolve());
});

it('asserts that an array can be counted and count is less than', function () {
    assertFalse(expect($this->array)->hasCountLessThan(1)->resolve());
    assertTrue(expect($this->array)->hasCountLessThan(4)->resolve());
});

it('asserts that an array can be counted and count is less than or equal', function () {
    assertFalse(expect($this->array)->hasCountLessOrEqualThan(1)->resolve());
    assertTrue(expect($this->array)->hasCountLessOrEqualThan(3)->resolve());
    assertTrue(expect($this->array)->hasCountLessOrEqualThan(4)->resolve());
});

it('asserts that an array can be counted and count is greater than', function () {
    assertFalse(expect($this->array)->hasCountGreaterThan(4)->resolve());
    assertTrue(expect($this->array)->hasCountGreaterThan(1)->resolve());
});

it('asserts that an array can be counted and count is greater than or equal', function () {
    assertFalse(expect($this->array)->hasCountGreaterOrEqualThan(4)->resolve());
    assertTrue(expect($this->array)->hasCountGreaterOrEqualThan(3)->resolve());
    assertTrue(expect($this->array)->hasCountGreaterOrEqualThan(1)->resolve());
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

it('asserts that an array can be checked for equality', function (){
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

it('asserts that an array can be checked for not equality', function (){
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