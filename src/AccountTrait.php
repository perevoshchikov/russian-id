<?php

namespace Anper\RussianId;

trait AccountTrait
{
    /**
     * @var array<int,int>
     */
    private $weights = [7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1, 3, 7, 1];

    /**
     * @param mixed $bik
     * @param mixed $account
     *
     * @return bool
     */
    public function __invoke($bik, $account): bool
    {
        return (new Bik())->__invoke($bik)
            && \is_numeric($account)
            && \preg_match('/^\d{20}$/', $account = (string) $account)
            && $this->checksum($bik, $account) === 0;
    }

    private function checksum(string $bik, string $account): int
    {
        $str = $this->getPrefix($bik, $account) . $account;

        $checkSum = 0;

        foreach ($this->weights as $k => $i) {
            $checkSum += $i * (int) ($str[$k] ?? 0) % 10;
        }

        return $checkSum % 10;
    }

    abstract protected function getPrefix(string $bik, string $account): string;
}
