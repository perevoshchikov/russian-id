<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Rs;
use PHPUnit\Framework\TestCase;

class RsTest extends TestCase
{
    public const BIK = '044030653';
    public const RS = '40702810955230165464';

    public function validRsProvider(): array
    {
        return [
            [static::BIK, static::RS],
        ];
    }

    public function invalidRsProvider(): array
    {
        return [
            ['0', static::RS],
            [static::BIK, '40702810955230165460'],
            [static::BIK, '0'],
            [static::BIK, 1],
            [static::BIK, 1.1],
            [static::BIK, []],
            [static::BIK, null],
            [static::BIK, new \DateTime()],
        ];
    }

    /**
     * @dataProvider validRsProvider
     */
    public function testValid($bik, $rs): void
    {
        $this->assertTrue((new Rs())->__invoke($bik, $rs));
    }

    /**
     * @dataProvider invalidRsProvider
     */
    public function testInvalid($bik, $rs): void
    {
        $this->assertFalse((new Rs())->__invoke($bik, $rs));
    }
}
