# Anper\RussianId

[![Software License][ico-license]](LICENSE.md)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-coverage]][link-coverage]

Простой валидатор для российских идентификаторов физических и юридических лиц. Проверяет только checksum.


## Supports
* Расчётный счёт
* Корреспондентский счёт
* ИНН
* КПП
* ОГРН/ОГРНИП
* ЕМП ОМС
* СНИЛС

## Install

``` bash
$ composer require anper/russian-id
```

## Basic usage

``` php
use Anper\RussianId\Validator;

Validator::isRs($bik, $rs);
Validator::isKs($bik, $ks);
Validator::isInn($inn);
Validator::isKpp($kpp);
Validator::isOgrn($ogrn);
Validator::isOms($oms);
Validator::isSnils($snils);
```

## Test

``` bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/anper/russian-id.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/perevoshchikov/russian-id/master.svg?style=flat-square
[ico-coverage]: https://img.shields.io/coveralls/github/perevoshchikov/russian-id/master.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/anper/russian-id
[link-travis]: https://travis-ci.org/perevoshchikov/russian-id
[link-coverage]: https://coveralls.io/github/perevoshchikov/russian-id?branch=master
