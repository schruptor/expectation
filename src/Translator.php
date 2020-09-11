<?php

namespace Schruptor\Expectation;

class Translator
{
    protected static $lookup = [
        'Schruptor\Expectation\StringExpectation' => [
            'toContain' => 'contains',
            'toBeLongerThan' => 'isLongerThan',
            'toBeLongerOrEqualThan' => 'isLongerOrEqualThan',
            'toBeShorterOrEqualThan' => 'isShorterOrEqualThan',
            'toBeShorterThan' => 'isShorterThan',
            'hasLength' => 'lengthIs',
        ],
        'Schruptor\Expectation\ArrayExpectation' => [
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
        'Schruptor\Expectation\NumericExpectation' => [
            'toBe42' => 'is42',
            'toBeGreaterThan' => 'isGreaterThan',
            'toBeGreaterThanOrEqual' => 'isGreaterThanOrEqual',
            'toBeLessThan' => 'isLessThan',
            'toBeLessThanOrEqual' => 'isLessThanOrEqual',
        ],
        'Schruptor\Expectation\Expectation' => [
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

    public function getLookup()
    {
        return self::$lookup;
    }

    public function get(String $class)
    {
        if (!array_key_exists($class, $this->getLookup())) {
            throw new \Exception('Zu übersetztenden Klasse nicht gefunden.');
        }

        if ($class === 'Schruptor\Expectation\Expectation') {
            return $this->getLookup()['Schruptor\Expectation\Expectation'];
        }

        return array_merge($this->getLookup()[$class], $this->getLookup()['Schruptor\Expectation\Expectation']);
    }
}