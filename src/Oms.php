<?php

namespace Anper\RussianId;

/**
 * Валидирует ЕНП ОМС.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=204797&dst=113673
 */
final class Oms
{
    /**
     * @param mixed $oms
     *
     * @return bool
     */
    public function __invoke($oms): bool
    {
        return \is_numeric($oms) && \preg_match('/^\d{16}$/', $oms = (string) $oms)
            && (int) $oms[15] === $this->checksum($oms);
    }

    private function checksum(string $oms): int
    {
        for ($a = '', $i = 14; $i >= 0; $i -= 2) {
            $a .= ($oms[$i] ?? 0);
        }

        for ($b = '', $i = 13; $i >= 0; $i -= 2) {
            $b .= ($oms[$i] ?? 0);
        }

        $c = $b . (2 * (int) $a);

        $sum = $max = \array_reduce(\mb_str_split($c), function ($carry, $item) {
            return $carry + $item;
        }, 0);

        while ($max % 10 !== 0) {
            $max++;
        }

        return $max - $sum;
    }
}
