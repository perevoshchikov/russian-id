# Anper\RussianId

[![Software License][ico-license]](LICENSE.md)
[![Latest Version on Packagist][ico-version]][link-packagist]
[![Build Status][ico-ga]][link-ga]

Простой валидатор для идентификаторов российских физических и юридических лиц. Проверяет только checksum.


## Supports
* БИК
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

Validator::isBik($bik);
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

## Assertion

``` php
use Anper\RussianId\Assert;
use Anper\RussianId\InvalidArgumentException;

try {
    Assert::bik($bik);
    Assert::rs($bik, $rs);
    Assert::ks($bik, $ks);
    Assert::inn($inn);
    Assert::personInn($inn);
    Assert::legalInn($inn);
    Assert::kpp($kpp);
    Assert::ogrn($ogrn);
    Assert::ogrnip($ogrnip);
    Assert::ogrnOrOgrnip($ogrnOrOgrnip);
    Assert::oms($oms);
    Assert::snils($snils);
} catch (InvalidArgumentException $e) {
    // invalid
}
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
[ico-ga]: https://github.com/perevoshchikov/russian-id/actions/workflows/build.yml/badge.svg

[link-packagist]: https://packagist.org/packages/anper/russian-id
[link-ga]: https://github.com/perevoshchikov/russian-id/actions/workflows/build.yml
