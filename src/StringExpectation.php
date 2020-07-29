<?php

namespace Schruptor\Expectation;

class StringExpectation extends Expectation
{
    public function contains(String $part)
    {
        $this->setResult(strpos($this->expected, $part) !== false);

        return $this;
    }

    public function toContain(String $part)
    {
        return $this->contains($part);
    }
}