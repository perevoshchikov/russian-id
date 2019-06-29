<?php

namespace Anper\IdValidation;

/**
 * Валидирует расчётнный счёт.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc;base=LAW;n=16053;fld=134;dst=4294967295#013609377551161095
 */
class CheckingAccount extends AbstractAccount
{
    /**
     * @inheritDoc
     */
    protected function getPrefix(): string
    {
        return \substr($this->bik, -3);
    }
}
