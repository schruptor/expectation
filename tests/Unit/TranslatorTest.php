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

it('can translate for the normal Expectation', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->bool)));

    $arrayThroughVariable = $this->translator->getLookup('Expectation');

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can translate for the StringExpectation', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->string)->isString()));


    $arrayThroughVariable = array_merge(
        $this->translator->getLookup('StringExpectation'),
        $this->translator->getLookup('Expectation')
    );

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can translate for the NumericExpectation', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->int)->isInt()));

    $arrayThroughVariable = array_merge(
        $this->translator->getLookup('NumericExpectation'),
        $this->translator->getLookup('Expectation')
    );

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});

it('can translate for the ArrayExpectation', function () {
    $arrayTroughClass = $this->translator->get(get_class(expect($this->array)->isArray()));

    $arrayThroughVariable = array_merge(
        $this->translator->getLookup('ArrayExpectation'),
        $this->translator->getLookup('Expectation')
    );

    assertEquals($arrayThroughVariable, $arrayTroughClass);
});