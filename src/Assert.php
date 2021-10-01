<?php

namespace Anper\RussianId;

final class Assert
{
    /**
     * @param mixed $bik
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function bik($bik, string $message = null): void
    {
        self::throwUnless(Validator::isBik($bik), $message ?? 'Bik is invalid');
    }

    /**
     * @param mixed $bik
     * @param mixed $rs
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function rs($bik, $rs, string $message = null): void
    {
        self::throwUnless(Validator::isRs($bik, $rs), $message ?? 'Rs is invalid');
    }

    /**
     * @param mixed $bik
     * @param mixed $ks
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function ks($bik, $ks, string $message = null): void
    {
        self::throwUnless(Validator::isKs($bik, $ks), $message ?? 'Ks is invalid');
    }

    /**
     * @param mixed $inn
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function inn($inn, string $message = null): void
    {
        self::throwUnless(Validator::isInn($inn), $message ?? 'Inn is invalid');
    }

    /**
     * @param mixed $inn
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function legalInn($inn, string $message = null): void
    {
        self::throwUnless(Validator::isLegalInn($inn), $message ?? 'Inn is invalid');
    }

    /**
     * @param mixed $inn
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function personInn($inn, string $message = null): void
    {
        self::throwUnless(Validator::isPersonInn($inn), $message ?? 'Inn is invalid');
    }

    /**
     * @param mixed $kpp
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function kpp($kpp, string $message = null): void
    {
        self::throwUnless(Validator::isKpp($kpp), $message ?? 'Kpp is invalid');
    }

    /**
     * @param mixed $ogrn
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function ogrn($ogrn, string $message = null): void
    {
        self::throwUnless(Validator::isOgrn($ogrn), $message ?? 'Ogrn is invalid');
    }

    /**
     * @param mixed $ogrnip
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function ogrnip($ogrnip, string $message = null): void
    {
        self::throwUnless(Validator::isOgrnip($ogrnip), $message ?? 'Ogrnip is invalid');
    }

    /**
     * @param mixed $ogrn
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function ogrnOrOgrnip($ogrn, string $message = null): void
    {
        self::throwUnless(Validator::isOgrnOrOgrnip($ogrn), $message ?? 'Ogrn is invalid');
    }

    /**
     * @param mixed $oms
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function oms($oms, string $message = null): void
    {
        self::throwUnless(Validator::isOms($oms), $message ?? 'Oms is invalid');
    }

    /**
     * @param mixed $snils
     * @param string|null $message
     *
     * @throws InvalidArgumentException
     */
    public static function snils($snils, string $message = null): void
    {
        self::throwUnless(Validator::isSnils($snils), $message ?? 'Snils is invalid');
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
