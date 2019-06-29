<?php

namespace Anper\IdValidation;

/**
 * Валидирует корреспондентский счёт.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc;base=LAW;n=16053;fld=134;dst=4294967295#013609377551161095
 */
class Ks extends AbstractAccount
{
    /**
     * @inheritDoc
     */
    protected function getPrefix(): string
    {
        return '0' .$this->bik[4] .$this->bik[5];
    }
}
