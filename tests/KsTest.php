<?php

namespace Anper\IdValidation\Tests;

use Anper\IdValidation\Ks;
use PHPUnit\Framework\TestCase;

class KsTest extends TestCase
{
    public const BIK = '044030653';
    public const ACCOUNT = '30101810500000000653';

    public function testValid()
    {
        $ks = new Ks(static::BIK, static::ACCOUNT);

        $this->assertTrue($ks->validate());
    }

    public function testInvalidBik()
    {
        $ks = new Ks(\implode('', \array_fill(0, 9, '0')), static::ACCOUNT);

        $this->assertFalse($ks->validate());
    }

    public function testInvalidKs()
    {
        $ks = new Ks(static::BIK, \implode('', \array_fill(0, 20, '0')));

        $this->assertFalse($ks->validate());
    }

    public function testInvalidBikLength()
    {
        $ks = new Ks('0', static::ACCOUNT);

        $this->assertFalse($ks->validate());
    }

    public function testInvalidKsLength()
    {
        $ks = new Ks(static::BIK, '0');

        $this->assertFalse($ks->validate());
    }

    public function testKsNotDigit()
    {
        $ks = new Ks(static::BIK, 'abcqbcab1');

        $this->assertFalse($ks->validate());
    }

    public function testBikNotDigit()
    {
        $ks = new Ks('abcabcabcabcabcabca1', static::ACCOUNT);

        $this->assertFalse($ks->validate());
    }
}
