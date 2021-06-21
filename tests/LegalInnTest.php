<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\LegalInn;
use PHPUnit\Framework\TestCase;

class LegalInnTest extends TestCase
{
    public function testValidInn()
    {
        $this->assertTrue((new LegalInn())->__invoke('7830002293'));
    }

    public function testInvalidInn()
    {
        $this->assertFalse((new LegalInn())->__invoke('1234567890'));
    }

    public function testInvalidInnLength()
    {
        $this->assertFalse((new LegalInn())->__invoke('0'));
    }

    public function testInnNotDigit()
    {
        $this->assertFalse((new LegalInn())->__invoke('abcabcabcab1'));
    }
}
