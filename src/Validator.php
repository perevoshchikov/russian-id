<?php

namespace Anper\RussianId;

class Validator
{
    public static function isRs(string $bik, string $rs): bool
    {
        return (new Rs())->__invoke($bik, $rs);
    }

    public static function isKs(string $bik, string $ks): bool
    {
        return (new Ks())->__invoke($bik, $ks);
    }

    public static function isInn(string $inn): bool
    {
        return static::isPersonInn($inn) || static::isLegalInn($inn);
    }

    public static function isLegalInn(string $inn): bool
    {
        return (new LegalInn())->__invoke($inn);
    }

    public static function isPersonInn(string $inn): bool
    {
        return (new PersonInn())->__invoke($inn);
    }

    public static function isKpp(string $kpp): bool
    {
        return (new Kpp())->__invoke($kpp);
    }

    public static function isOgrn(string $ogrn): bool
    {
        return (new Ogrn())->__invoke($ogrn);
    }

    public static function isOgrnip(string $ogrnip): bool
    {
        return (new Ogrnip())->__invoke($ogrnip);
    }

    public static function isOgrnOrOgrnip(string $ogrnOrOgrnip): bool
    {
        return static::isOgrn($ogrnOrOgrnip) || static::isOgrnip($ogrnOrOgrnip);
    }

    public static function isOms(string $oms): bool
    {
        return (new Oms())->__invoke($oms);
    }

    public static function isSnils(string $snils): bool
    {
        return (new Snils())->__invoke($snils);
    }
}
