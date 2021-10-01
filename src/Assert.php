<?php

namespace Anper\RussianId;

final class Assert
{
    /**
     * @throws InvalidArgumentException
     */
    public static function bik($bik): void
    {
        self::throwUnless(Validator::isBik($bik), 'Bik is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function rs($bik, $rs): void
    {
        self::throwUnless(Validator::isRs($bik, $rs), 'Rs is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function ks($bik, $ks): void
    {
        self::throwUnless(Validator::isKs($bik, $ks), 'Ks is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function inn($inn): void
    {
        self::throwUnless(Validator::isInn($inn), 'Inn is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function legalInn($inn): void
    {
        self::throwUnless(Validator::isLegalInn($inn), 'Inn is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function personInn($inn): void
    {
        self::throwUnless(Validator::isPersonInn($inn), 'Inn is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function kpp($kpp): void
    {
        self::throwUnless(Validator::isKpp($kpp), 'Kpp is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function ogrn($ogrn): void
    {
        self::throwUnless(Validator::isOgrn($ogrn), 'Ogrn is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function ogrnip($ogrnip): void
    {
        self::throwUnless(Validator::isOgrnip($ogrnip), 'Ogrnip is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function ogrnOrOgrnip($ogrn): void
    {
        self::throwUnless(Validator::isOgrnOrOgrnip($ogrn), 'Ogrn is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function oms($oms): void
    {
        self::throwUnless(Validator::isOms($oms), 'Oms is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    public static function snils($snils): void
    {
        self::throwUnless(Validator::isSnils($snils), 'Snils is invalid');
    }

    /**
     * @throws InvalidArgumentException
     */
    private static function throwUnless(bool $valid, string $message): void
    {
        if (!$valid) {
            throw new InvalidArgumentException($message);
        }
    }
}
