# A class to validate assertions

## Usage:

```php
$myString = 'Testing';

expect($myString)
    ->toBeString()
    ->toContain('Test')
    ->toBeShorterThan(8)
    ->resolve();
```

```php
use Schruptor\Expectation\Expectation;

$myArray = ['a' => 'A', 'b' => 'B', 'c' => 'C'];

Expectation::isThat($myArray)
    ->isArray()
    ->hasKeys(['a', 'b', 'c'])
    ->hasValue('B')
    ->resolve();
```

## Installation

You can install the package via composer:

```bash
composer require schruptor/expectation --dev
```
