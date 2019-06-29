<?php

namespace Anper\IdValidation;

/**
 * Валидирует ОГРН и ОГРИП.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%9D%D0%BE%D0%BC%D0%B5%D1%80%D0%B0_%D0%9E%D0%93%D0%A0%D0%9D_%D0%B8_%D0%9E%D0%93%D0%A0%D0%9D%D0%98%D0%9F
 */
class Ogrn implements ValidatorInterface
{
    /**
     * @var string
     */
    protected $ogrn;

    /**
     * @param string $ogrn
     */
    public function __construct(string $ogrn)
    {
        $this->ogrn = $ogrn;
    }

    /**
     * @inheritDoc
     */
    public function validate(): bool
    {
        if (!\preg_match('/(^\d{13}$)|(^\d{15}$)/', $this->ogrn)) {
            return false;
        }

        if (\strlen($this->ogrn) === 13) {
            return (int) $this->ogrn[12] === $this->checksum(11);
        }

        return (int) $this->ogrn[14] === $this->checksum(13);
    }

    /**
     * @param int $div
     *
     * @return int
     */
    protected function checksum(int $div): int
    {
        $checkSum = \substr($this->ogrn, 0, $div + 1) % $div;

        return $checkSum > 9
            ? $checkSum % 10
            : $checkSum;
    }
}
