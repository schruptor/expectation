<?php

namespace Schruptor\Expectation;

class NumericExpectation extends Expectation
{
    public function is42()
    {
        $this->setResult($this->expected === 42);

        return $this;
    }

    public function isGreaterThan(float $value)
    {
        $this->setResult($this->expected > $value);

        return $this;
    }

    public function isGreaterThanOrEqual(float $value)
    {
        $this->setResult($this->expected >= $value);

        return $this;
    }

    public function isLessThan(float $value)
    {
        $this->setResult($this->expected < $value);

        return $this;
    }

    public function isLessThanOrEqual(float $value)
    {
        $this->setResult($this->expected <= $value);

        return $this;
    }
}