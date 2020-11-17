<?php

namespace Schruptor\Expectation;

use ReflectionClass;

class Translator
{
    protected $lookup = [
        'StringExpectation' => [
            'toContain' => 'contains',
            'toBeLongerThan' => 'isLongerThan',
            'toBeLongerOrEqualThan' => 'isLongerOrEqualThan',
            'toBeShorterOrEqualThan' => 'isShorterOrEqualThan',
            'toBeShorterThan' => 'isShorterThan',
            'hasLength' => 'lengthIs',
        ],
        'ArrayExpectation' => [
            'toContain' => 'hasValue',
            'contains' => 'hasValue',
            'toHaveCount' => 'hasCount',
            'toHaveCountGreaterThan' => 'hasCountGreaterThan',
            'toHaveCountGreaterOrEqualThan' => 'hasCountGreaterOrEqualThan',
            'toHaveCountLessThan' => 'hasCountLessThan',
            'toHaveCountLessOrEqualThan' => 'hasCountLessOrEqualThan',
            'toHaveValue' => 'hasValue',
            'toHaveValues' => 'hasValues',
            'toHaveKey' => 'hasKey',
            'tohaveKeys' => 'hasKeys',
        ],
        'NumericExpectation' => [
            'toBe42' => 'is42',
            'toBeGreaterThan' => 'isGreaterThan',
            'toBeGreaterThanOrEqual' => 'isGreaterThanOrEqual',
            'toBeLessThan' => 'isLessThan',
            'toBeLessThanOrEqual' => 'isLessThanOrEqual',
        ],
        'Expectation' => [
            'toBe' => 'is',
            'toEqual' => 'is',
            'isEqual' => 'is',
            'toBeTrue' => 'isTrue',
            'toBeFalse' => 'isFalse',
            'toBeInstanceOf' => 'isInstanceOf',
            'toBeWritableDirectory' => 'isWritableDirectory',
            'toBeDirectory' => 'isDirectory',
            'toBeFile' => 'isFile',
            'toBeString' => 'isString',
            'toBeIterable' => 'isIterable',
            'toBeScalar' => 'isScalar',
            'toBeBool' => 'isBool',
            'toBeNumeric' => 'isNumeric',
            'toBeInt' => 'isInt',
            'toBeNull' => 'isNull',
            'toBeInteger' => 'isInt',
            'isInteger' => 'isInt',
            'toBeFloat' => 'isFloat',
            'toBeEmpty' => 'isEmpty',
            'toBeObject' => 'isObject',
            'toBeCallable' => 'isCallable',
            'toBeCountable' => 'isCountable',
            'toBeArray' => 'isArray',
            'toHaveProperty' => 'hasProperty',
        ],
    ];

    public function getLookup(String $name = null) : array
    {
        if ($name && key_exists($name, $this->lookup)) {
            return $this->lookup[$name];
        }

        return $this->lookup;
    }

    public function get(String $class)
    {
        $class = (new ReflectionClass($class))->getShortName();

        if (!array_key_exists($class, $this->getLookup())) {
            throw new \Exception('Zu übersetztenden Klasse nicht gefunden.');
        }

        if ($class === 'Expectation') {
            return $this->getLookup('Expectation');
        }

        return array_merge($this->getLookup($class), $this->getLookup('Expectation'));
    }
}