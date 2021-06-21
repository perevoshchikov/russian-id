<?php

namespace Anper\RussianId;

/**
 * Валидирует ИНН физического лица.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%9D%D0%BE%D0%BC%D0%B5%D1%80%D0%B0_%D0%98%D0%9D%D0%9D
 */
class PersonInn extends AbstractInn
{
    /**
     * @var array<int,int>
     */
    protected $weights12_1 = [7 ,2, 4, 10, 3, 5, 9, 4, 6, 8];

    /**
     * @var array<int,int>
     */
    protected $weights12_2 = [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8];

    public function __invoke(string $inn): bool
    {
        if (!\preg_match('/^\d{12}$/', $inn)) {
            return false;
        }

        return (int) $inn[10] === $this->checksum($inn, $this->weights12_1)
            && (int) $inn[11] === $this->checksum($inn, $this->weights12_2);
    }
}
