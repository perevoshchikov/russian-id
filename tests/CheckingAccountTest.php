<?php

namespace Anper\IdValidation\Tests;

use Anper\IdValidation\CheckingAccount;
use PHPUnit\Framework\TestCase;

class CheckingAccountTest extends TestCase
{
    public const BIK = '044030653';
    public const ACCOUNT = '40702810955230165464';

    public function testValid()
    {
        $ca = new CheckingAccount(static::BIK, static::ACCOUNT);

        $this->assertTrue($ca->validate());
    }

    public function testInvalidBik()
    {
        $ca = new CheckingAccount(\implode('', \array_fill(0, 9, '0')), static::ACCOUNT);

        $this->assertFalse($ca->validate());
    }

    public function testInvalidRs()
    {
        $ca = new CheckingAccount(static::BIK, \implode('', \array_fill(0, 20, '0')));

        $this->assertFalse($ca->validate());
    }

    public function testInvalidBikLength()
    {
        $ca = new CheckingAccount('0', static::ACCOUNT);

        $this->assertFalse($ca->validate());
    }

    public function testInvalidRsLength()
    {
        $ca = new CheckingAccount(static::BIK, '0');

        $this->assertFalse($ca->validate());
    }

    public function testRsNotDigit()
    {
        $ca = new CheckingAccount(static::BIK, 'abcabcab1');

        $this->assertFalse($ca->validate());
    }

    public function testBikNotDigit()
    {
        $ca = new CheckingAccount('abcabcabcabcabcabca1', static::ACCOUNT);

        $this->assertFalse($ca->validate());
    }
}
