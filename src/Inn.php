<?php

namespace Anper\IdValidation;

/**
 * Валидирует ИНН.
 *
 * @see https://ru.wikipedia.org/wiki/%D0%9A%D0%BE%D0%BD%D1%82%D1%80%D0%BE%D0%BB%D1%8C%D0%BD%D0%BE%D0%B5_%D1%87%D0%B8%D1%81%D0%BB%D0%BE#%D0%9D%D0%BE%D0%BC%D0%B5%D1%80%D0%B0_%D0%98%D0%9D%D0%9D
 */
class Inn implements ValidatorInterface
{
    /**
     * @var array
     */
    protected $weights10 = [2, 4, 10, 3, 5, 9, 4, 6, 8];

    /**
     * @var array
     */
    protected $weights12_1 = [7 ,2, 4, 10, 3, 5, 9, 4, 6, 8];

    /**
     * @var array
     */
    protected $weights12_2 = [3, 7, 2, 4, 10, 3, 5, 9, 4, 6, 8];

    /**
     * @var string
     */
    protected $inn;

    /**
     * @param string $inn
     */
    public function __construct(string $inn)
    {
        $this->inn = $inn;
    }

    /**
     * @inheritDoc
     */
    public function validate(): bool
    {
        if (!\preg_match('/(^\d{10}$)|(^\d{12}$)/', $this->inn)) {
            return false;
        }

        if (\strlen($this->inn) === 10) {
            return $this->verify($this->inn[9], $this->weights10);
        }

        return $this->verify($this->inn[10], $this->weights12_1)
            && $this->verify($this->inn[11], $this->weights12_2);
    }

    /**
     * @param int $toCheck
     * @param array $weights
     *
     * @return bool
     */
    protected function verify(int $toCheck, array $weights): bool
    {
        $checkSum = 0;

        foreach ($weights as $k => $i) {
            $checkSum += $i * ($this->inn[$k] ?? 0);
        }

        return ($checkSum % 11) % 10 === $toCheck;
    }
}
