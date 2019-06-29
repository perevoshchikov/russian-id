<?php

namespace Anper\IdValidation;

/**
 * Валидирует ЕНП ОМС.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=204797&dst=113673
 */
class Oms implements ValidationInterface
{
    /**
     * @var string
     */
    protected $oms;

    /**
     * @param string $oms
     */
    public function __construct(string $oms)
    {
        $this->oms = $oms;
    }

    /**
     * @inheritDoc
     */
    public function validate(): bool
    {
        if (!\preg_match('/^\d{16}$/', $this->oms)) {
            return false;
        }

        return (int) $this->oms[15] === $this->checksum();
    }

    /**
     * @return int
     */
    protected function checksum(): int
    {
        for ($a = '', $i = 14; $i >= 0; $i-=2) {
            $a .= ($this->oms[$i] ?? 0);
        }

        for ($b = '', $i = 13; $i >= 0; $i-=2) {
            $b .= ($this->oms[$i] ?? 0);
        }

        $c = $b . ($a*2);

        $sum = $max = \array_reduce(\str_split($c), function ($carry, $item) {
            return $carry + $item;
        }, 0);

        while ($max % 10 !== 0) {
            $max++;
        }

        return $max - $sum;
    }
}
