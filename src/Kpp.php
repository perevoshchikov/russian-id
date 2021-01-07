<?php

namespace Anper\RussianId;

/**
 * Валидирует КПП.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=134082&dst=1000000001#012933603811932848
 */
class Kpp implements ValidationInterface
{
    /**
     * @var string
     */
    protected $kpp;

    /**
     * @param string $kpp
     */
    public function __construct(string $kpp)
    {
        $this->kpp = $kpp;
    }

    /**
     * @inheritDoc
     */
    public function validate(): bool
    {
        return (bool) \preg_match('/^\d{4}[\dA-Z]{2}\d{3}$/', $this->kpp);
    }
}
