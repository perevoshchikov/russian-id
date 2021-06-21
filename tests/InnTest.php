<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Inn;
use PHPUnit\Framework\TestCase;

class InnTest extends TestCase
{
    public const INN_12 = '500100732259';
    public const INN_10 = '7830002293';

    public function testValidPersonInn()
    {
        $this->assertTrue((new Inn())->__invoke(static::INN_12));
    }

    public function testValidLegalInn()
    {
        $this->assertTrue((new Inn())->__invoke(static::INN_10));
    }

    public function testInvalidPersonInn()
    {
        $this->assertFalse((new Inn())->__invoke('123456789000'));
    }

    public function testInvalidLegalInn()
    {
        $this->assertFalse((new Inn())->__invoke('1234567890'));
    }

    public function testInvalidInnLength()
    {
        $this->assertFalse((new Inn())->__invoke('0'));
    }

    public function testInnNotDigit()
    {
        $this->assertFalse((new Inn())->__invoke('abcabcabcab1'));
    }
}
