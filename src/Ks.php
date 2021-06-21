<?php

namespace Anper\RussianId;

/**
 * Валидирует корреспондентский счёт.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc;base=LAW;n=16053;fld=134;dst=4294967295#013609377551161095
 */
class Ks
{
    use AccountChecksumTrait;

    protected function getPrefix(string $bik, string $account): string
    {
        return '0' . $bik[4] . $bik[5];
    }
}
