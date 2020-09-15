<?php

namespace Schruptor\Expectation;

/** @mixin Expectation */
class InvertedExpectation
{
    private $expectation;

    public function __construct($expectation)
    {
        $this->expectation = $expectation;
    }

    public function __call($name, $arguments)
    {
        $this->expectation->setResultForce(!$this->expectation->$name(...$arguments)->resolve());

        return $this->expectation;
    }
}