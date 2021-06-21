<?php

namespace Anper\RussianId;

trait InnChecksumTrait
{
    /**
     * @param string $inn
     * @param array<int,int> $weights
     *
     * @return int
     */
    private function checksum(string $inn, array $weights): int
    {
        $checkSum = 0;

        foreach ($weights as $k => $i) {
            $checkSum += $i * (int) ($inn[$k] ?? 0);
        }

        return ($checkSum % 11) % 10;
    }
}
