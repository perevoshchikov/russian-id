<?php

namespace Anper\IdValidation;

/**
 * Валидирует КПП.
 *
 * @see http://www.consultant.ru/cons/cgi/online.cgi?req=doc&base=LAW&n=134082&dst=1000000001#012933603811932848
 */
class Kpp implements ValidatorInterface
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
        return \preg_match('/^\d{4}[\dA-Z]{2}\d{3}$/', $this->kpp);
    }
}
