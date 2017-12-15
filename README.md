What is the Monolog filters library?
====================================
[![Latest Stable Version](https://poser.pugx.org/core23/monolog-filters/v/stable)](https://packagist.org/packages/core23/monolog-filters)
[![Latest Unstable Version](https://poser.pugx.org/core23/monolog-filters/v/unstable)](https://packagist.org/packages/core23/monolog-filters)
[![License](https://poser.pugx.org/core23/monolog-filters/license)](https://packagist.org/packages/core23/monolog-filters)

[![Build Status](https://travis-ci.org/core23/monolog-filters.svg)](http://travis-ci.org/core23/monolog-filters)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/core23/monolog-filters/badges/quality-score.png)](https://scrutinizer-ci.com/g/core23/monolog-filters/)
[![Coverage Status](https://coveralls.io/repos/core23/monolog-filters/badge.svg)](https://coveralls.io/r/core23/monolog-filters)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/68658a2b-ffec-4c45-876d-f292d5b605cc/mini.png)](https://insight.sensiolabs.com/projects/582dff80-204e-4edb-a719-58cede02a0c5)

[![Donate to this project using Flattr](https://img.shields.io/badge/flattr-donate-yellow.svg)](https://flattr.com/profile/core23)
[![Donate to this project using PayPal](https://img.shields.io/badge/paypal-donate-yellow.svg)](https://paypal.me/gripp)

This library adds more filters to [Monolog].

### Installation

```
php composer.phar require core23/monolog-filters
```

### Symfony usage

#### Enabling the bundle

```php
    // app/AppKernel.php

    public function registerBundles()
    {
        return array(
            // ...
            
            new Core23\MonologFilters\Bridge\Symfony\Bundle\Core23MonologFiltersBundle(),

            // ...
        );
    }
```

This lib / bundle is available under the [MIT license](LICENSE.md).

[Monolog]: https://github.com/Seldaek/monolog
