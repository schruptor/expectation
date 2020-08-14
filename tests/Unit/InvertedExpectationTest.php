<?php
namespace Schruptor\Expectation\Tests;

use Schruptor\Expectation\Expectation;

beforeEach(function () {
    $this->string = 'Testing';
    $this->word = 'Test';
    $this->integer = 1;
    $this->float = 0.0000001;
    $this->array = ['a' => 'A', 'b' => 'B', 'c' => 'C'];
    $this->bool = true;
    $this->callable = function () { return true; };
    $this->object = (object) array('value' => true);
    $this->empty = '';
    $this->null = null;
    $this->dir = __DIR__;
    $this->file = $this->dir . '/ExpectationTest.php';
});
it('asserts that a sting can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->string)
        ->not()
        ->isString()
        ->resolve()
    );
});

it('asserts that a bool can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->bool)
            ->not()
            ->isBool()
            ->resolve()
    );
});

it('asserts that an array can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->array)
            ->not()
            ->isArray()
            ->resolve()
    );
});

it('asserts that an integer can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->integer)
            ->not()
            ->isInt()
            ->resolve()
    );
});

it('asserts that an integer can be sloppy checked for type', function (){
    assertFalse(
        Expectation::isThat($this->integer)
            ->not()
            ->isNumeric()
            ->resolve()
    );
});

it('asserts that a scalar can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->integer)
            ->not()
            ->isScalar()
            ->resolve()
    );
});

it('asserts that not a scalar can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->string)
            ->not()
            ->isScalar()
            ->resolve()
    );
});

it('asserts that a float can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->float)
            ->not()
            ->isFloat()
            ->resolve()
    );
});

it('asserts that an iterable can be checked for type', function () {
    assertFalse(
        Expectation::isThat(iterable())
            ->not()
            ->isIterable()
            ->resolve()
    );
});

it('asserts that a callable can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->callable)
            ->not()
            ->isCallable()
            ->resolve()
    );
});

it('asserts that an empty string can be checked for emptieness', function (){
    assertFalse(
        Expectation::isThat($this->empty)
            ->not()
            ->isEmpty()
            ->resolve()
    );
});

it('asserts that an object can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->object)
            ->not()
            ->isObject()
            ->resolve()
    );
});

it('asserts that a null variable can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->null)
            ->not()
            ->isNull()
            ->resolve()
    );
});

it('asserts that a countable can be checked for type', function (){
    assertFalse(
        Expectation::isThat($this->array)
            ->not()
            ->isCountable()
            ->resolve()
    );
});