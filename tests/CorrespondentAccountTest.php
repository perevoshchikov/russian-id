<?php

namespace Anper\IdValidation\Tests;

use Anper\IdValidation\CorrespondentAccount;
use PHPUnit\Framework\TestCase;

class CorrespondentAccountTest extends TestCase
{
    public const BIK = '044030653';
    public const ACCOUNT = '30101810500000000653';

    public function testValid()
    {
        $ca = new CorrespondentAccount(static::BIK, static::ACCOUNT);

        $this->assertTrue($ca->validate());
    }

    public function testInvalidBik()
    {
        $ca = new CorrespondentAccount(\implode('', \array_fill(0, 9, '0')), static::ACCOUNT);

        $this->assertFalse($ca->validate());
    }

    public function testInvalidKs()
    {
        $ca = new CorrespondentAccount(static::BIK, \implode('', \array_fill(0, 20, '0')));

        $this->assertFalse($ca->validate());
    }

    public function testInvalidBikLength()
    {
        $ca = new CorrespondentAccount('0', static::ACCOUNT);

        $this->assertFalse($ca->validate());
    }

    public function testInvalidKsLength()
    {
        $ca = new CorrespondentAccount(static::BIK, '0');

        $this->assertFalse($ca->validate());
    }

    public function testKsNotDigit()
    {
        $ca = new CorrespondentAccount(static::BIK, 'abc');

        $this->assertFalse($ca->validate());
    }

    public function testBikNotDigit()
    {
        $ca = new CorrespondentAccount('abc', static::ACCOUNT);

        $this->assertFalse($ca->validate());
    }
}
