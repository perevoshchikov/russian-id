<?php

namespace Anper\RussianId;

final class Validator
{
    /**
     * @param mixed $bik
     * @param mixed $rs
     *
     * @return bool
     */
    public static function isRs($bik, $rs): bool
    {
        return (new Rs())->__invoke($bik, $rs);
    }

    /**
     * @param mixed $bik
     * @param mixed $ks
     *
     * @return bool
     */
    public static function isKs($bik, $ks): bool
    {
        return (new Ks())->__invoke($bik, $ks);
    }

    /**
     * @param mixed $inn
     *
     * @return bool
     */
    public static function isInn($inn): bool
    {
        return self::isPersonInn($inn) || self::isLegalInn($inn);
    }

    /**
     * @param mixed $inn
     *
     * @return bool
     */
    public static function isLegalInn($inn): bool
    {
        return (new LegalInn())->__invoke($inn);
    }

    /**
     * @param mixed $inn
     *
     * @return bool
     */
    public static function isPersonInn($inn): bool
    {
        return (new PersonInn())->__invoke($inn);
    }

    /**
     * @param mixed $kpp
     *
     * @return bool
     */
    public static function isKpp($kpp): bool
    {
        return (new Kpp())->__invoke($kpp);
    }

    /**
     * @param mixed $ogrn
     *
     * @return bool
     */
    public static function isOgrn($ogrn): bool
    {
        return (new Ogrn())->__invoke($ogrn);
    }

    /**
     * @param mixed $ogrnip
     *
     * @return bool
     */
    public static function isOgrnip($ogrnip): bool
    {
        return (new Ogrnip())->__invoke($ogrnip);
    }

    /**
     * @param mixed $ogrnOrOgrnip
     *
     * @return bool
     */
    public static function isOgrnOrOgrnip($ogrnOrOgrnip): bool
    {
        return self::isOgrn($ogrnOrOgrnip) || self::isOgrnip($ogrnOrOgrnip);
    }

    /**
     * @param mixed $oms
     *
     * @return bool
     */
    public static function isOms($oms): bool
    {
        return (new Oms())->__invoke($oms);
    }

    /**
     * @param mixed $snils
     *
     * @return bool
     */
    public static function isSnils($snils): bool
    {
        return (new Snils())->__invoke($snils);
    }

    /**
     * @param mixed $bik
     *
     * @return bool
     */
    public static function isBik($bik): bool
    {
        return (new Bik())->__invoke($bik);
    }
}
