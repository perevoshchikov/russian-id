<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Kpp;
use PHPUnit\Framework\TestCase;

class KppTest extends TestCase
{
    public function validKppProvider(): array
    {
        return [
            ['514944513'],
            [114944513],
            ['0108A4934'],
        ];
    }

    public function invalidKppProvider(): array
    {
        return [
            ['123abc'],
            [1],
            [[]],
            [null],
            [1.0],
            [new \DateTime()],
        ];
    }

    /**
     * @dataProvider validKppProvider
     */
    public function testValid($value): void
    {
        $this->assertTrue((new Kpp())->__invoke($value));
    }

    /**
     * @dataProvider invalidKppProvider
     */
    public function testInvalidKpp($value): void
    {
        $this->assertFalse((new Kpp())->__invoke($value));
    }
}
