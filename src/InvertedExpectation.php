<?php

namespace Schruptor\Expectation;

class InvertedExpectation
{
    public function __construct($expectation)
    {
        $this->expectation = $expectation;
    }

    public function __call($name, $arguments)
    {
        return $this->expectation->setResultForce(!$this->expectation->$name($arguments)->resolve());
    }
}