<?php

namespace Anper\RussianId;

final class Validator
{
    public static function isRs($bik, $rs): bool
    {
        return (new Rs())->__invoke($bik, $rs);
    }

    public static function isKs($bik, $ks): bool
    {
        return (new Ks())->__invoke($bik, $ks);
    }

    public static function isInn($inn): bool
    {
        return static::isPersonInn($inn) || static::isLegalInn($inn);
    }

    public static function isLegalInn($inn): bool
    {
        return (new LegalInn())->__invoke($inn);
    }

    public static function isPersonInn($inn): bool
    {
        return (new PersonInn())->__invoke($inn);
    }

    public static function isKpp($kpp): bool
    {
        return (new Kpp())->__invoke($kpp);
    }

    public static function isOgrn($ogrn): bool
    {
        return (new Ogrn())->__invoke($ogrn);
    }

    public static function isOgrnip($ogrnip): bool
    {
        return (new Ogrnip())->__invoke($ogrnip);
    }

    public static function isOgrnOrOgrnip($ogrnOrOgrnip): bool
    {
        return self::isOgrn($ogrnOrOgrnip) || self::isOgrnip($ogrnOrOgrnip);
    }

    public static function isOms($oms): bool
    {
        return (new Oms())->__invoke($oms);
    }

    public static function isSnils($snils): bool
    {
        return (new Snils())->__invoke($snils);
    }

    public static function isBik($bik): bool
    {
        return (new Bik())->__invoke($bik);
    }
}
