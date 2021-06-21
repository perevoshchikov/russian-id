<?php

namespace Anper\RussianId;

/**
 * Валидирует ИНН юридического лица.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%9D%D0%BE%D0%BC%D0%B5%D1%80%D0%B0_%D0%98%D0%9D%D0%9D
 */
class LegalInn extends AbstractInn
{
    /**
     * @var array<int,int>
     */
    protected $weights = [2, 4, 10, 3, 5, 9, 4, 6, 8];

    public function __invoke(string $inn): bool
    {
        return \preg_match('/^\d{10}$/', $inn)
            && (int) $inn[9] === $this->checksum($inn, $this->weights);
    }
}
