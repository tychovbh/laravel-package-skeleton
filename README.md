# laravel-package-skeleton

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Total Downloads][ico-downloads]][link-downloads]

Laravel Package Skeleton is created by, and is maintained by Tycho, and is a Laravel/Lumen package to create new packages. Feel free to check out the [change log](CHANGELOG.md), [releases](https://github.com/tychovbh/laravel-package-skeleton/releases), [license](LICENSE.md), and [contribution guidelines](CONTRIBUTING.md)


## Install
Install through composer

    composer require --dev tychovbh/laravel-package-skeleton

Run the setup this will create a folder bootstrap/cache. Do not remove this folder at any time
    
    php vendor/tychovbh/laravel-package-skeleton/setup

All Laravel Artisan commands are now available, use the following one to install a package:

    php artisan make:skeleton
    
You will be ask a few questions that will be needed to generate your composer.json file and Service Provider. 

## Usage

You are now setup to develop your package with. The package comes with [orchestra/testbench](https://github.com/orchestral/testbench) for writing test cases. But you can decide to use whatever you desire.

Use artisan to generate your controllers, models, migrations etc.

If included during skelleton creation:
- routes should be located in `{project_root}/routes`
- views should be located in `{project_root}/views`
- config should be located in `{project_root}/config`

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CODE_OF_CONDUCT](CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email info@bespokeweb.nl instead of using the issue tracker.

## Credits

- [Tycho][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/tychovbh/laravel-package-skeleton.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/tychovbh/laravel-package-skeleton/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/tychovbh/laravel-package-skeleton.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/tychovbh/laravel-package-skeleton.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/tychovbh/laravel-package-skeleton.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/tychovbh/laravel-package-skeleton
[link-travis]: https://travis-ci.org/tychovbh/laravel-package-skeleton
[link-scrutinizer]: https://scrutinizer-ci.com/g/tychovbh/laravel-package-skeleton/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/tychovbh/laravel-package-skeleton
[link-downloads]: https://packagist.org/packages/tychovbh/laravel-package-skeleton
[link-author]: https://github.com/tychovbh
[link-contributors]: ../../contributors
