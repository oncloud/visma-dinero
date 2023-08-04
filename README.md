# Visma Dinero - An expressive API wrapper for Dinero Accounting software

[![Latest Version on Packagist](https://img.shields.io/packagist/v/oncloud/visma-dinero.svg?style=flat-square)](https://packagist.org/packages/oncloud/visma-dinero)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/oncloud/visma-dinero/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/oncloud/visma-dinero/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/oncloud/visma-dinero/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/oncloud/visma-dinero/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/oncloud/visma-dinero.svg?style=flat-square)](https://packagist.org/packages/oncloud/visma-dinero)

A Laravel wrapper which makes it easy to use the Visma Dinero API. It has an expressive and elegant syntax for working 
with the Dinero API

## Installation

You can install the package via composer:

```bash
composer require oncloud/visma-dinero
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="dinero-config"
```

This is the contents of the published config file:

```php
return [
];
```

## Usage
The package is built around the Dinero API. You can read more about the API here: https://api.dinero.dk/docs/

### Authentication
Dinero uses OAuth2 for authentication. You can use the `Dinero::authenticate()` method to authenticate with Dinero. It'll
redirect the user to the Visma Connect OAuth2 page, where they can login and authorize your application. After the user 
logs in, they'll be redirected back to your application. You'll receive an access token, scope and iss.

### Refreshing the access token


## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Jimmi Hansen](https://github.com/FoksVHox)
- [OnCloud I/S](https://github.com/OnCloud)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
