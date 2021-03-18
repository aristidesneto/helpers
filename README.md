# Helpers

[![Latest Version on Packagist](https://img.shields.io/packagist/v/aristidesneto/helpers)](https://packagist.org/packages/aristidesneto/helpers)
[![Total Downloads](https://img.shields.io/packagist/dt/aristidesneto/helpers)](https://packagist.org/packages/aristidesneto/helpers)


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

Validations::cnpj('11222333444455'); // true or false

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

Helpers::mask('(##) #####-####', '12999887766'); // (12) 99988-7766
Helpers::mask('##.###.###/####-##', '41636863000137'); // 41.636.863/0001-37
```

## Testes

```bash
composer test
```

## Contribuindo

Veja [CONTRIBUTING](.github/CONTRIBUTING.md) para mais detalhes.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
