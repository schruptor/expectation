<?php

use Schruptor\Expectation\Translator;

beforeEach(function () {
    $this->string = 'Testing';
    $this->int = 1;
    $this->bool = true;
    $this->array = ['a' => 'A'];
});

it('can get the translation for the normal expectation', function () {
    $arrayTroughClass = Translator::get(get_class(expect($this->bool)));

    $arrayThroughVariable = Translator::$lookup['Schruptor\Expectation\Expectation'];

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can get the translation for strings', function () {
    $arrayTroughClass = Translator::get(get_class(expect($this->string)->isString()));

    $arrayThroughVariable = array_merge(Translator::$lookup['Schruptor\Expectation\StringExpectation'], Translator::$lookup['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can get the translation for int', function () {
    $arrayTroughClass = Translator::get(get_class(expect($this->int)->isInt()));

    $arrayThroughVariable = array_merge(Translator::$lookup['Schruptor\Expectation\NumericExpectation'], Translator::$lookup['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can get the translation for array', function () {
    $arrayTroughClass = Translator::get(get_class(expect($this->array)->isArray()));

    $arrayThroughVariable = array_merge(Translator::$lookup['Schruptor\Expectation\ArrayExpectation'], Translator::$lookup['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});