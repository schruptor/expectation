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

    public function toBe($check)
    {
        return $this->is($check);
    }

    public function isNot($check)
    {
        $this->not()
            ->setResult((bool) $this->expected === $check);

        return $this;
    }

    public function isTrue()
    {
        $this->setResult( $this->expected === true);

        return $this;
    }

    public function toBeTrue()
    {
        return $this->isTrue;
    }

    public function isFalse()
    {
        $this->setResult( $this->expected === false);

        return $this;
    }

    public function toBeFalse()
    {
        return $this->isTrue;
    }
    
    public function isInstanceOf($class)
    {
        $this->setResult($this->expected instanceof $class);

        return $this;
    }

    public function toBeInstanceOf($class)
    {
        return $this->isInstanceOf($class);
    }

    public function isWritableDirectory()
    {
        $this->setResult(is_writable($this->expected));

        return $this;
    }

    public function toBeWritableDirectory()
    {
        return $this->isWritableDirectory();
    }

    public function isDirectory()
    {
        $this->setResult(is_dir($this->expected));

        return $this;
    }

    public function toBeDirectory()
    {
        return $this->isDirectory();
    }

    public function isFile()
    {
        $this->setResult(is_file($this->expected));

        return $this;
    }

    public function toBeFile()
    {
        return $this->isFile();
    }

    public function isString()
    {
        $this->setResult(is_string($this->expected));

        return $this;
    }

    public function toBeString()
    {
        return $this->isString();
    }

    public function isBool()
    {
        $this->setResult(is_bool($this->expected));

        return $this;
    }

    public function toBeBool()
    {
        return $this->isBool();
    }

    public function toBeNumeric()
    {
        return $this->isNumeric();
    }

    public function isNumeric()
    {
        $this->setResult(is_numeric($this->expected));

        return $this;
    }

    public function toBeInt()
    {
        return $this->isInt();
    }

    public function isInt()
    {
        $this->setResult(is_integer($this->expected));

        return $this;
    }

    public function toBeNull()
    {
        return $this->isNull();
    }

    public function isNull()
    {
        $this->setResult(is_null($this->expected));

        return $this;
    }

    public function toBeInteger()
    {
        return $this->isInt();
    }

    public function isInteger()
    {
        return $this->isInt();
    }


    public function isFloat()
    {
        $this->setResult(is_float($this->expected));

        return $this;
    }

    public function toBeFloat()
    {
        return $this->isFloat();
    }

    public function isEmpty()
    {
        $this->setResult(empty($this->expected));

        return $this;
    }

    public function toBeEmpty()
    {
        return $this->isEmpty();
    }

    public function isObject()
    {
        $this->setResult(is_object($this->expected));

        return $this;
    }

    public function toBeObject()
    {
        return $this->isObject();
    }

    public function isCallable()
    {
        $this->setResult(is_callable($this->expected));

        return $this;
    }

    public function toBeCallable()
    {
        return $this->isCallable();
    }

    public function isCountable()
    {
        $this->setResult(is_countable($this->expected));

        return $this;
    }

    public function toBeCountable()
    {
        return $this->isCountable();
    }

    public function isArray()
    {
        $this->setResult(is_array($this->expected));

        return $this;
    }

    public function toBeArray()
    {
        return $this->isArray();
    }

    public function hasProperty(String $name)
    {
        $this->setResult(property_exists($this->expected, $name));

        return $this;
    }

    public function toHaveProperty(String $name)
    {
        return $this->hasProperty($name);
    }
}