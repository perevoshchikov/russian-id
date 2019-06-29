<?php

namespace Anper\IdValidation;

abstract class AbstractAccount implements ValidatorInterface
{
    /**
     * @var array
     */
    protected $weights = [7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1];

    /**
     * @var string
     */
    protected $bik;

    /**
     * @var string
     */
    protected $account;

    /**
     * @param string $bik
     * @param string $account
     */
    public function __construct(string $bik, string $account)
    {
        $this->bik = $bik;
        $this->account = $account;
    }

    /**
     * @inheritDoc
     */
    public function validate(): bool
    {
        if (!\preg_match('/^\d{9}$/', $this->bik)) {
            return false;
        }

        if (!\preg_match('/^\d{20}$/', $this->account)) {
            return false;
        }

        $str = $this->getPrefix() . $this->account;

        $checkSum = 0;

        foreach ($this->weights as $k => $i) {
            $checkSum += $i * $str[$k] % 10;
        }

        return $checkSum % 10 === 0;
    }

    /**
     * @return string
     */
    abstract protected function getPrefix(): string;
}
