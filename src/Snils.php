<?php

namespace Anper\RussianId;

/**
 * Валидирует СНИЛС.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%A1%D1%82%D1%80%D0%B0%D1%85%D0%BE%D0%B2%D0%BE%D0%B9_%D0%BD%D0%BE%D0%BC%D0%B5%D1%80_%D0%B8%D0%BD%D0%B4%D0%B8%D0%B2%D0%B8%D0%B4%D1%83%D0%B0%D0%BB%D1%8C%D0%BD%D0%BE%D0%B3%D0%BE_%D0%BB%D0%B8%D1%86%D0%B5%D0%B2%D0%BE%D0%B3%D0%BE_%D1%81%D1%87%D1%91%D1%82%D0%B0_(%D0%A0%D0%BE%D1%81%D1%81%D0%B8%D1%8F)
 */
final class Snils
{
    /**
     * @param mixed $snils
     *
     * @return bool
     */
    public function __invoke($snils): bool
    {
        if (\is_string($snils)) {
            $snils = \preg_replace('/[^0-9]/', '', $snils);
        }

        return \is_numeric($snils)
            && \preg_match('/^\d{11}$/', $snils = (string) $snils)
            && (int) \mb_substr($snils, -2) === $this->checksum($snils);
    }

    private function checksum(string $snils): int
    {
        $checkSum = 0;

        for ($i = 0; $i < 9; $i++) {
            $checkSum += (int) ($snils[$i] ?? 0) * (9 - $i);
        }

        if ($checkSum === 100 || $checkSum === 101) {
            $checkSum = 0;
        }

        if ($checkSum > 101) {
            return $checkSum % 101;
        }

        return $checkSum;
    }
}
