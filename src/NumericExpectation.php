<?php

namespace Schruptor\Expectation;

class NumericExpectation extends Expectation
{
    public function is42()
    {
        $this->setResult($this->expected === 42);

        return $this;
    }

    public function toBe42()
    {
        return $this->is42();
    }

    public function toBeGreaterThan(float $value)
    {
        return $this->isGreaterThan($value);
    }

    public function isGreaterThan(float $value)
    {
        $this->setResult($this->expected > $value);

        return $this;
    }

    public function toBeGreaterThanOrEqual(float $value)
    {
        return $this->isGreaterThanOrEqual($value);
    }

    public function isGreaterThanOrEqual(float $value)
    {
        $this->setResult($this->expected >= $value);

        return $this;
    }

    public function toBeLessThan(float $value)
    {
        return $this->isLessThan($value);
    }

    public function isLessThan(float $value)
    {
        $this->setResult($this->expected < $value);

        return $this;
    }

    public function toBeLessThanOrEqual(float $value)
    {
        return $this->isLessThanOrEqual($value);
    }

    public function isLessThanOrEqual(float $value)
    {
        $this->setResult($this->expected <= $value);

        return $this;
    }
}