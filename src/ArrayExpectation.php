<?php

namespace Schruptor\Expectation;

class ArrayExpectation extends Expectation
{
    public function toContain($value)
    {
        return $this->hasValue($value);
    }

    public function contains($value)
    {
        return $this->hasValue($value);
    }

    public function hasCount(int $count)
    {
        $this->setResult(count($this->expected) === $count);

        return $this;
    }

    public function toHaveCount(int $count)
    {
        return $this->hasCount();
    }

    public function toHaveValue($value)
    {
        return $this->hasValue($value);
    }

    public function hasValue($value)
    {
        $this->setResult(in_array($value, $this->expected));

        return $this;
    }

    public function toHaveValues(array $values)
    {
        return $this->hasValues($values);
    }

    public function hasValues(Array $values)
    {
        foreach ($values as $value){
            $this->hasValue($value);
        }

        return $this;
    }

    public function toHaveKey($key)
    {
        return $this->hasKey($key);
    }

    public function hasKey($key)
    {
        $this->setResult(array_key_exists($key, $this->expected));

        return $this;
    }

    public function HaveKeysto(array $keys)
    {
        return $this->hasKeys($keys);
    }

    public function hasKeys(Array $keys)
    {
        foreach ($keys as $key){
            $this->hasKey($key);
        }

        return $this;
    }
}