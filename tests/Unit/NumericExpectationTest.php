<?php

use Schruptor\Expectation\Expectation;
use Schruptor\Expectation\NumericExpectation;

beforeEach(function () {
    $this->integer = 1;
    $this->float = 0.0000001;
    $this->less = 0.01;
    $this->greater = 1;
    $this->fortyTwo = 42;
});

it('asserts that a number return the NumericExpectation', function () {
    assertTrue(Expectation::isThat($this->integer) instanceof NumericExpectation);
});

it('asserts that a number can be greater than the expectation', function () {
    assertTrue(expect($this->greater)->isGreaterThan($this->less)->resolve());
    assertFalse(expect($this->greater)->isGreaterThan($this->greater)->resolve());
});

it('asserts that a number can be greater or equal than the expectation', function () {
    assertTrue(expect($this->greater)->isGreaterThanOrEqual($this->less)->resolve());
    assertTrue(expect($this->greater)->isGreaterThanOrEqual($this->integer)->resolve());
    assertFalse(expect($this->greater)->isGreaterThanOrEqual($this->integer + 1)->resolve());
});


it('asserts that a number can be less than the expectation', function () {
    assertTrue(expect($this->less)->isLessThan($this->greater)->resolve());
    assertFalse(expect($this->less)->isLessThan($this->less)->resolve());
});

it('asserts that a number can be less or equal than the expectation', function () {
    assertTrue(expect($this->less)->isLessThanOrEqual($this->greater)->resolve());
    assertTrue(expect($this->greater)->isLessThanOrEqual($this->integer)->resolve());
    assertFalse(expect($this->greater)->isLessThanOrEqual($this->integer - 1)->resolve());
});

it('asserts that a number can be 42', function () {
    assertTrue(expect($this->fortyTwo)->is42()->resolve());
    assertFalse(expect($this->integer)->is42()->resolve());
});