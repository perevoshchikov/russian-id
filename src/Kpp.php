<?php

namespace Anper\RussianId;

/**
 * Валидирует КПП.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=134082&dst=1000000001#012933603811932848
 */
final class Kpp
{
    public function __invoke(string $kpp): bool
    {
        return (bool) \preg_match('/^\d{4}[\dA-Z]{2}\d{3}$/', $kpp);
    }
}
