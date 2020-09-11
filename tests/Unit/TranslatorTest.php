<?php

use Schruptor\Expectation\Translator;
use function Schruptor\expect;

beforeEach(function () {
    $this->string = 'Testing';
    $this->int = 1;
    $this->bool = true;
    $this->array = ['a' => 'A'];
    $this->translator = new Translator();
});

it('can get the translation for the normal expectation', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->bool)));

    $arrayThroughVariable = $this->translator->getLookup()['Schruptor\Expectation\Expectation'];

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can get the translation for strings', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->string)->isString()));

    $arrayThroughVariable = array_merge($this->translator->getLookup()['Schruptor\Expectation\StringExpectation'], $this->translator->getLookup()['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can get the translation for int', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->int)->isInt()));

    $arrayThroughVariable = array_merge($this->translator->getLookup()['Schruptor\Expectation\NumericExpectation'], $this->translator->getLookup()['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can get the translation for array', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->array)->isArray()));

    $arrayThroughVariable = array_merge($this->translator->getLookup()['Schruptor\Expectation\ArrayExpectation'], $this->translator->getLookup()['Schruptor\Expectation\Expectation']);

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});