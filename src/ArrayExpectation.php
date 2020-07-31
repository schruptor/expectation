<?php

namespace Schruptor\Expectation;

class ArrayExpectation extends Expectation
{
    public function hasCount(int $count)
    {
        $this->setResult(count($this->expected) === $count);

        return $this;
    }

    public function hasCountGreaterThan(int $count)
    {
        $this->setResult(count($this->expected) > $count);

        return $this;
    }

    public function hasCountGreaterOrEqualThan(int $count)
    {
        $this->setResult(count($this->expected) >= $count);

        return $this;
    }

    public function hasCountLessThan(int $count)
    {
        $this->setResult(count($this->expected) < $count);

        return $this;
    }

    public function hasCountLessOrEqualThan(int $count)
    {
        $this->setResult(count($this->expected) <= $count);

        return $this;
    }

    public function hasValue($value)
    {
        $this->setResult(in_array($value, $this->expected));

        return $this;
    }

    public function hasValues(Array $values)
    {
        foreach ($values as $value){
            $this->hasValue($value);
        }

        return $this;
    }

    public function hasKey($key)
    {
        $this->setResult(array_key_exists($key, $this->expected));

        return $this;
    }

    public function hasKeys(Array $keys)
    {
        foreach ($keys as $key){
            $this->hasKey($key);
        }

        return $this;
    }
}