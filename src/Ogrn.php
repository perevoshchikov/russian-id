<?php

namespace Anper\RussianId;

/**
 * Валидирует ОГРН.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%9D%D0%BE%D0%BC%D0%B5%D1%80%D0%B0_%D0%9E%D0%93%D0%A0%D0%9D_%D0%B8_%D0%9E%D0%93%D0%A0%D0%9D%D0%98%D0%9F
 */
final class Ogrn
{
    use OgrnChecksumTrait;

    /**
     * @param mixed $ogrn
     *
     * @return bool
     */
    public function __invoke($ogrn): bool
    {
        return \is_numeric($ogrn)
            && \preg_match('/^\d{13}$/', $ogrn = (string) $ogrn)
            && (int) $ogrn[12] === $this->checksum($ogrn, 11);
    }
}
