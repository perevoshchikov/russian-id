<?php

namespace Anper\RussianId;

/**
 * Валидирует ИНН юридического лица.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%9D%D0%BE%D0%BC%D0%B5%D1%80%D0%B0_%D0%98%D0%9D%D0%9D
 */
final class LegalInn
{
    use InnChecksumTrait;

    /**
     * @var array<int,int>
     */
    private $weights = [2, 4, 10, 3, 5, 9, 4, 6, 8];

    /**
     * @param mixed $inn
     *
     * @return bool
     */
    public function __invoke($inn): bool
    {
        return \is_numeric($inn)
            && \preg_match('/^\d{10}$/', $inn = (string) $inn)
            && (int) $inn[9] === $this->checksum($inn, $this->weights);
    }
}
