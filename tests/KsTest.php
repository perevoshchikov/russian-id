<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Ks;
use PHPUnit\Framework\TestCase;

class KsTest extends TestCase
{
    public const BIK = '044030653';
    public const KS = '30101810500000000653';

    public function validKsProvider(): array
    {
        return [
            [static::BIK, static::KS],
        ];
    }

    public function invalidKsProvider(): array
    {
        return [
            ['0', static::KS],
            [static::BIK, '30101810500000000650'],
            [static::BIK, '0'],
            [static::BIK, 1],
            [static::BIK, 1.1],
            [static::BIK, []],
            [static::BIK, null],
            [static::BIK, new \DateTime()],
        ];
    }

    /**
     * @dataProvider validKsProvider
     */
    public function testValid($bik, $ks): void
    {
        $this->assertTrue((new Ks())->__invoke($bik, $ks));
    }

    /**
     * @dataProvider invalidKsProvider
     */
    public function testInvalid($bik, $ks): void
    {
        $this->assertFalse((new Ks())->__invoke($bik, $ks));
    }
}
