# DEPRECATED

This library is deprecated, use [exclude_http_codes](https://www.symfony-news.com/news/details/new-in-symfony-4-1-ignore-specific-http-codes-from-logs) option or [HttpCodeActivationStrategy](https://github.com/symfony/monolog-bridge/blob/4.1/Handler/FingersCrossed/HttpCodeActivationStrategy.php) class instead.

Monolog filters
===============

This library adds more filters to [Monolog].

## Installation

Open a command console, enter your project directory and execute the following command to download the latest stable version of this library:

```
composer require core23/monolog-filters
```

## Symfony usage

If you want to use this library inside symfony, you can use a bridge.

### Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles in `bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
   Core23\MonologFilters\Bridge\Symfony\Bundle\Core23MonologFiltersBundle::class => ['all' => true],
];
```

## License

This library is under the [MIT license](LICENSE.md).

[Monolog]: https://github.com/Seldaek/monolog
