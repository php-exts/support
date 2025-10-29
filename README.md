<p style="text-align:center;font-size:46px;"> PHP Support Library</p>

## About
- PHP Support Library

## Installation
- Install with [Composer](https://getcomposer.org/)
  - `composer require ext/support`

## Features
- Facade

## Usage
```php
<?php

namespace Namespace\Facade;

use Zeus\Facade;

class Foo extends Facade
{
  public static function bind()
  {
    return ClassName:class;
  }
}


use Namespace\Facade\Foo;

Foo::method();

```

## Documentation
-

## CHANGELOG
See [CHANGELOG.md]()

## Contributing
-

## Security Vulnerabilities
-

## License

The XXX is open-sourced software licensed under the [MIT]() license.

Example See https://choosealicense.com/licenses
