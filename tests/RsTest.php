<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Rs;
use PHPUnit\Framework\TestCase;

class RsTest extends TestCase
{
    public const BIK = '044030653';
    public const ACCOUNT = '40702810955230165464';

    public function testValid(): void
    {
        $this->assertTrue((new Rs())->__invoke(static::BIK, static::ACCOUNT));
    }

    public function testInvalidBik(): void
    {
        $bik = \implode('', \array_fill(0, 9, '0'));

        $this->assertFalse((new Rs())->__invoke($bik, static::ACCOUNT));
    }

    public function testInvalidRs(): void
    {
        $account = \implode('', \array_fill(0, 20, '0'));

        $this->assertFalse((new Rs())->__invoke(static::BIK, $account));
    }

    public function testInvalidBikLength(): void
    {
        $this->assertFalse((new Rs())->__invoke('0', static::ACCOUNT));
    }

    public function testInvalidRsLength(): void
    {
        $this->assertFalse((new Rs())->__invoke(static::BIK, '0'));
    }

    public function testRsNotDigit(): void
    {
        $this->assertFalse((new Rs())->__invoke(static::BIK, 'abcabcab1'));
    }

    public function testBikNotDigit(): void
    {
        $this->assertFalse((new Rs())->__invoke('abcabcabcabcabcabca1', static::ACCOUNT));
    }
}
