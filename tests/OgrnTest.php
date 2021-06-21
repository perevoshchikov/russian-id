<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Ogrn;
use PHPUnit\Framework\TestCase;

class OgrnTest extends TestCase
{
    public function ogrnProvider(): array
    {
        return [
            ['1151232294620'],   // orgn
            ['1138218667113'],   // orgn, checksum more 9
            ['315850060115169'], // orgnip
            ['314833285032522'], // orgnip, checksum more 9
        ];
    }

    /**
     * @dataProvider ogrnProvider
     * @param string $value
     */
    public function testValid(string $value)
    {
        $this->assertTrue((new Ogrn())->__invoke($value));
    }

    public function testValidLength()
    {
        $this->assertFalse((new Ogrn())->__invoke('0'));
    }

    public function testValidOgrn()
    {
        $this->assertFalse((new Ogrn())->__invoke('1151232294621'));
    }

    public function testValidOgrnip()
    {
        $this->assertFalse((new Ogrn())->__invoke('315850060115160'));
    }

    public function testNotDigit()
    {
        $this->assertFalse((new Ogrn())->__invoke('abcabcabcabc1'));
    }
}
