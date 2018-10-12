Monolog filters
===============
[![Latest Stable Version](https://poser.pugx.org/core23/monolog-filters/v/stable)](https://packagist.org/packages/core23/monolog-filters)
[![Latest Unstable Version](https://poser.pugx.org/core23/monolog-filters/v/unstable)](https://packagist.org/packages/core23/monolog-filters)
[![License](https://poser.pugx.org/core23/monolog-filters/license)](LICENSE.md)

[![Total Downloads](https://poser.pugx.org/core23/monolog-filters/downloads)](https://packagist.org/packages/core23/monolog-filters)
[![Monthly Downloads](https://poser.pugx.org/core23/monolog-filters/d/monthly)](https://packagist.org/packages/core23/monolog-filters)
[![Daily Downloads](https://poser.pugx.org/core23/antispam-bundle/d/daily)](https://packagist.org/packages/core23/antispam-bundle)

[![Build Status](https://travis-ci.org/core23/monolog-filters.svg)](http://travis-ci.org/core23/monolog-filters)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/core23/monolog-filters/badges/quality-score.png)](https://scrutinizer-ci.com/g/core23/monolog-filters/)
[![Code Climate](https://codeclimate.com/github/core23/monolog-filters/badges/gpa.svg)](https://codeclimate.com/github/core23/monolog-filters)
[![Coverage Status](https://coveralls.io/repos/core23/monolog-filters/badge.svg)](https://coveralls.io/r/core23/monolog-filters)

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
