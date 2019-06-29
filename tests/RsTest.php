<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Rs;
use PHPUnit\Framework\TestCase;

class RsTest extends TestCase
{
    public const BIK = '044030653';
    public const ACCOUNT = '40702810955230165464';

    public function testValid()
    {
        $rs = new Rs(static::BIK, static::ACCOUNT);

        $this->assertTrue($rs->validate());
    }

    public function testInvalidBik()
    {
        $rs = new Rs(\implode('', \array_fill(0, 9, '0')), static::ACCOUNT);

        $this->assertFalse($rs->validate());
    }

    public function testInvalidRs()
    {
        $rs = new Rs(static::BIK, \implode('', \array_fill(0, 20, '0')));

        $this->assertFalse($rs->validate());
    }

    public function testInvalidBikLength()
    {
        $rs = new Rs('0', static::ACCOUNT);

        $this->assertFalse($rs->validate());
    }

    public function testInvalidRsLength()
    {
        $rs = new Rs(static::BIK, '0');

        $this->assertFalse($rs->validate());
    }

    public function testRsNotDigit()
    {
        $rs = new Rs(static::BIK, 'abcabcab1');

        $this->assertFalse($rs->validate());
    }

    public function testBikNotDigit()
    {
        $rs = new Rs('abcabcabcabcabcabca1', static::ACCOUNT);

        $this->assertFalse($rs->validate());
    }
}
