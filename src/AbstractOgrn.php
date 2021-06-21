<?php

namespace Anper\RussianId;

abstract class AbstractOgrn
{
    protected function checksum(string $ogrn, int $div): int
    {
        $checkSum = \mb_substr($ogrn, 0, $div + 1) % $div;

        return $checkSum > 9
            ? $checkSum % 10
            : $checkSum;
    }
}
