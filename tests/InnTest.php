<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Inn;
use PHPUnit\Framework\TestCase;

class InnTest extends TestCase
{
    public const INN_12 = '500100732259';
    public const INN_10 = '7830002293';

    public function testValidInn12()
    {
        $inn = new Inn(static::INN_12);

        $this->assertTrue($inn->validate());
    }

    public function testValidInn10()
    {
        $inn = new Inn(static::INN_10);

        $this->assertTrue($inn->validate());
    }

    public function testInvalidInn12()
    {
        $inn = new Inn('123456789000');

        $this->assertFalse($inn->validate());
    }

    public function testInvalidInn10()
    {
        $inn = new Inn('1234567890');

        $this->assertFalse($inn->validate());
    }

    public function testInvalidInnLength()
    {
        $inn = new Inn('0');

        $this->assertFalse($inn->validate());
    }

    public function testInnNotDigit()
    {
        $inn = new Inn('abcabcabcab1');

        $this->assertFalse($inn->validate());
    }
}
