# TRM Package for PHP

This package provides a simple way to retrieve the TRM (Tasa Representativa del Mercado) value for Colombia for a given date or the current date.

## Installation

You can install the package via Composer:

```bash
composer require mlopez/trm
```

## Usage

```php
use Mlopez\Trm\Trm;

$trm = new Trm();
$result = $trm->call('2023-12-31');

print_r($result);
```

## License
The TRM Package is open-sourced software licensed under the MIT license.
