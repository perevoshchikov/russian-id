<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\PersonInn;
use PHPUnit\Framework\TestCase;

class PersonInnTest extends TestCase
{
    public function testValidInn()
    {
        $this->assertTrue((new PersonInn())->__invoke('500100732259'));
    }

    public function testInvalidInn()
    {
        $this->assertFalse((new PersonInn())->__invoke('123456789000'));
    }

    public function testInvalidInnLength()
    {
        $this->assertFalse((new PersonInn())->__invoke('0'));
    }

    public function testInnNotDigit()
    {
        $this->assertFalse((new PersonInn())->__invoke('abcabcabcab1'));
    }
}
