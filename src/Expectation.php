<?php

namespace Schruptor\Expectation;

class Expectation
{
    protected $expected;
    protected $result = null;
    protected $modifier = null;

    private function __construct($expected)
    {
        $this->expected = $expected;
    }

    public static function isThat($expected) : self
    {
        if (is_array($expected)) {
            return new ArrayExpectation($expected);
        }

        if (is_string($expected)) {
            return new StringExpectation($expected);
        }

        if (is_numeric($expected)) {
            return new NumericExpectation($expected);
        }

        return new self($expected);
    }

    protected function setModifier($modifier)
    {
        $this->modifier = $modifier;
    }

    /** @return bool|null */
    public function resolve()
    {
        return $this->result;
    }

    protected function setResult(Bool $check) : Bool
    {
        if ($this->result == null) {
            if ($this->modifier != null) {
                $this->modifier = null;
                return $this->result = !$check;
            }

            return $this->result = $check;
        }

        if ($this->modifier != null) {
            $this->modifier = null;
            return $this->result && !$check;
        }

        return $this->result && $check;
    }

    public function and($expected)
    {
        $instance = self::isThat($expected);

        $instance->setResult($this->resolve());

        return $instance;
    }

    public function not()
    {
        $this->modifier = '!';

        return $this;
    }

    public function is($check)
    {
        $this->setResult( $this->expected === $check);

        return $this;
    }

    public function isNot($check)
    {
        $this->not()
            ->is($check);

        return $this;
    }

    public function isTrue()
    {
        $this->setResult( $this->expected === true);

        return $this;
    }

    public function isFalse()
    {
        $this->setResult( $this->expected === false);

        return $this;
    }
    
    public function isInstanceOf($class)
    {
        $this->setResult($this->expected instanceof $class);

        return $this;
    }


    public function isWritableDirectory()
    {
        $this->setResult(is_writable($this->expected));

        return $this;
    }

    public function isDirectory()
    {
        $this->setResult(is_dir($this->expected));

        return $this;
    }

    public function isFile()
    {
        $this->setResult(is_file($this->expected));

        return $this;
    }

    public function isString()
    {
        $this->setResult(is_string($this->expected));

        return $this;
    }

    public function isIterable()
    {
        $this->setResult(is_iterable($this->expected));

        return $this;
    }

    public function isScalar()
    {
        $this->setResult(is_scalar($this->expected));

        return $this;
    }

    public function isBool()
    {
        $this->setResult(is_bool($this->expected));

        return $this;
    }

    public function isNumeric()
    {
        $this->setResult(is_numeric($this->expected));

        return $this;
    }

    public function isInt()
    {
        $this->setResult(is_integer($this->expected));

        return $this;
    }

    public function isNull()
    {
        $this->setResult(is_null($this->expected));

        return $this;
    }

    public function isFloat()
    {
        $this->setResult(is_float($this->expected));

        return $this;
    }

    public function isEmpty()
    {
        $this->setResult(empty($this->expected));

        return $this;
    }

    public function isObject()
    {
        $this->setResult(is_object($this->expected));

        return $this;
    }

    public function isCallable()
    {
        $this->setResult(is_callable($this->expected));

        return $this;
    }

    public function isCountable()
    {
        $this->setResult(is_countable($this->expected));

        return $this;
    }

    public function isArray()
    {
        $this->setResult(is_array($this->expected));

        return $this;
    }

    public function hasProperty(String $name)
    {
        $this->setResult(property_exists($this->expected, $name));

        return $this;
    }

    public function __call($name, $arguments)
    {
        if (!array_key_exists($name, Translator::get(get_class($this)))) {
            throw new \Exception('Werfen ' . $name);
        }

        return $this->{Translator::get(get_class($this))[$name]}(...$arguments);
    }
}