# Helpers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aristides/helpers.svg?style=flat-square)](https://packagist.org/packages/aristidesneto/helpers)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/aristides/helpers/Tests?label=tests)](https://github.com/aristidesneto/helpers/actions?query=workflow%3ATests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/aristides/helpers.svg?style=flat-square)](https://packagist.org/packages/aristidesneto/helpers)


Conjunto de classes de `Helpers` e `Validations` para otimizar sua aplicação.

## Instalação

Instale o pacote via composer:

```bash
composer require aristidesneto/helpers
```

## Uso

```php
require __DIR__ . '/vendor/autoload.php';

use Aristides\Helpers\Helpers;
use Aristides\Helpers\Validations;

// Validações
Validations::cpf('123.456.789-10'); // true or false
Validations::email('contato@email.com') // true or false

// Helpers
Helpers::money2Real('1485.48'); // 1.485,48
Helpers::money2Real('873.11', true); // R$ 873,11

Helpers::money2Db('45.367,98'); // 45367.98
Helpers::money2Db('R$ 88.475.411,89'); // 88475411.89

Helpers::transformMonth(3); // Março
Helpers::transformMonth(3, false); // Mar

Helpers::transformWeekDays(2); // Segunda-feira
Helpers::transformWeekDays(2, false); // Seg
```

## Testes

```bash
composer test
```

## Contribuindo

Veja [CONTRIBUTING](.github/CONTRIBUTING.md) para mais detalhes.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
