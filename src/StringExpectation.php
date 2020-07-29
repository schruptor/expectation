<?php

namespace Schruptor\Expectation;

class StringExpectation extends Expectation
{
    public function contains(String $part)
    {
        $this->setResult(strpos($this->expected, $part) !== false);

        return $this;
    }

    public function isLongerThan(int $length)
    {
        $this->setResult(strlen($this->expected) > $length);

        return $this;
    }

    public function isLongerOrEqualThan(int $length)
    {
        $this->setResult(strlen($this->expected) >= $length);

        return $this;
    }

    public function isShorterOrEqualThan(int $length)
    {
        $this->setResult(strlen($this->expected) <= $length);

        return $this;
    }

    public function isShorterThan(int $length)
    {
        $this->setResult(strlen($this->expected) <= $length);

        return $this;
    }

    public function lengthIs(int $length)
    {
        $this->setResult(strlen($this->expected) == $length);

        return $this;
    }
}