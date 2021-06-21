<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Ks;
use PHPUnit\Framework\TestCase;

class KsTest extends TestCase
{
    public const BIK = '044030653';
    public const ACCOUNT = '30101810500000000653';

    public function testValid()
    {
        $this->assertTrue((new Ks())->__invoke(static::BIK, static::ACCOUNT));
    }

    public function testInvalidBik()
    {
        $bik = \implode('', \array_fill(0, 9, '0'));

        $this->assertFalse((new Ks())->__invoke($bik, static::ACCOUNT));
    }

    public function testInvalidKs()
    {
        $account = \implode('', \array_fill(0, 20, '0'));

        $this->assertFalse((new Ks())->__invoke(static::BIK, $account));
    }

    public function testInvalidBikLength()
    {
        $this->assertFalse((new Ks())->__invoke('0', static::ACCOUNT));
    }

    public function testInvalidKsLength()
    {
        $this->assertFalse((new Ks())->__invoke(static::BIK, '0'));
    }

    public function testKsNotDigit()
    {
        $this->assertFalse((new Ks())->__invoke(static::BIK, 'abcqbcab1'));
    }

    public function testBikNotDigit()
    {
        $this->assertFalse((new Ks())->__invoke('abcabcabcabcabcabca1', static::ACCOUNT));
    }
}
