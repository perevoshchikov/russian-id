<?php

namespace Anper\RussianId;

class Validator
{
    /**
     * @param string $bik
     * @param string $rs
     *
     * @return bool
     */
    public static function isRs(string $bik, string $rs): bool
    {
        return (new Rs($bik, $rs))->validate();
    }

    /**
     * @param string $bik
     * @param string $ks
     *
     * @return bool
     */
    public static function isKs(string $bik, string $ks): bool
    {
        return (new Ks($bik, $ks))->validate();
    }

    /**
     * @param string $inn
     *
     * @return bool
     */
    public static function isInn(string $inn): bool
    {
        return (new Inn($inn))->validate();
    }

    /**
     * @param string $kpp
     *
     * @return bool
     */
    public static function isKpp(string $kpp): bool
    {
        return (new Kpp($kpp))->validate();
    }

    /**
     * @param string $ogrn
     *
     * @return bool
     */
    public static function isOgrn(string $ogrn): bool
    {
        return (new Ogrn($ogrn))->validate();
    }

    /**
     * @param string $oms
     *
     * @return bool
     */
    public static function isOms(string $oms): bool
    {
        return (new Oms($oms))->validate();
    }

    /**
     * @param string $snils
     *
     * @return bool
     */
    public static function isSnils(string $snils): bool
    {
        return (new Snils($snils))->validate();
    }
}
