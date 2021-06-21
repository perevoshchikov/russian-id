# Anper\RussianId

[![Software License][ico-license]](LICENSE.md)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-ga]][link-ga]

Простой валидатор для идентификаторов российских физических и юридических лиц. Проверяет только checksum.


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
Validator::isPersonInn($inn);
Validator::isLegalInn($inn);
Validator::isKpp($kpp);
Validator::isOgrn($ogrn);
Validator::isOgrnip($ogrnip);
Validator::isOgrnOrOgrnip($ogrnOrOgrnip);
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

[ico-version]: https://img.shields.io/packagist/v/anper/russian-id.svg
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg
[ico-ga]: https://github.com/perevoshchikov/russian-id/actions/workflows/tests.yml/badge.svg

[link-packagist]: https://packagist.org/packages/anper/russian-id
[link-ga]: https://github.com/perevoshchikov/russian-id/actions/workflows/tests.yml
