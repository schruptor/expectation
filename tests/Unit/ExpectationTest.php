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

it(' ', function(){
    assertTrue(expect($this->integer)->toBe($this->integer)->resolve());
});

it('assert it can use the shorthand global function', function(){
    assertTrue(expect($this->string)->isString()->resolve());
});

it('asserts that no expectation returns null', function () {
    assertNull(Expectation::isThat($this->null)->resolve());
});

it('asserts that a bool return the Expectation', function () {
    assertInstanceOf(Expectation::class, Expectation::isThat($this->bool));
});

it('asserts that a sting can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->string)
        ->isString()
        ->resolve()
    );
});

it('asserts that a bool can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->bool)
            ->isBool()
            ->resolve()
    );
});

it('asserts that an array can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->isArray()
            ->resolve()
    );
});

it('asserts that an integer can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->integer)
            ->isInt()
            ->resolve()
    );
});

it('asserts that an integer can be sloppy checked for type', function (){
    assertTrue(
        Expectation::isThat($this->integer)
            ->isNumeric()
            ->resolve()
    );
});

it('asserts that a scalar can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->integer)
            ->isScalar()
            ->resolve()
    );
});

it('asserts that not a scalar can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->isScalar()
            ->resolve()
    );
});

it('asserts that a float can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->float)
            ->isFloat()
            ->resolve()
    );
});

it('asserts that an iterable can be checked for type', function () {
    assertTrue(
        Expectation::isThat(iterable())
            ->isIterable()
            ->resolve()
    );
});

it('asserts that a callable can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->callable)
            ->isCallable()
            ->resolve()
    );
});

it('asserts that an empty string can be checked for emptieness', function (){
    assertTrue(
        Expectation::isThat($this->empty)
            ->isEmpty()
            ->resolve()
    );
});

it('asserts that an object can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->object)
            ->isObject()
            ->resolve()
    );
});

it('asserts that a null variable can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->null)
            ->isNull()
            ->resolve()
    );
});

it('asserts that a countable can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->array)
            ->isCountable()
            ->resolve()
    );
});

it('asserts that a dir can be checked for availability', function (){
    assertTrue(
        Expectation::isThat($this->dir)
            ->isDirectory()
            ->resolve()
    );
});

it('asserts that a dir can be checked for availability and is writeable', function (){
    assertTrue(
        Expectation::isThat($this->dir)
            ->isWritableDirectory()
            ->resolve()
    );
});

it('asserts that a file can be checked for availability', function (){
    assertTrue(
        Expectation::isThat($this->file)
            ->isFile()
            ->resolve()
    );
});

it('asserts that a sting can be checked for type with the not modifier', function (){
    assertFalse(
        Expectation::isThat($this->string)
            ->not()
            ->isString()
            ->resolve()
    );
});

it('asserts that a object has a Property', function (){
    assertTrue(
        Expectation::isThat($this->object)
            ->hasProperty('value')
            ->resolve()
    );
});

it('asserts that two sting can be checked for type', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->isString()
            ->and($this->string)
            ->not()
            ->isString()
            ->resolve()
    );
});

it('asserts that expectations can be chained', function (){
    assertTrue(
        Expectation::isThat($this->string)
            ->isString()
            ->contains('Test')
            ->and($this->integer)
            ->not()
            ->isString()
            ->isInteger()
            ->isGreaterThan(0)
            ->resolve()
    );
});