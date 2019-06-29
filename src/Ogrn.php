<?php

namespace Anper\IdValidation;

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
