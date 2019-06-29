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
        $ogrn = new Ogrn($value);

        $this->assertTrue($ogrn->validate());
    }

    public function testValidLength()
    {
        $ogrn = new Ogrn('0');

        $this->assertFalse($ogrn->validate());
    }

    public function testValidOgrn()
    {
        $ogrn = new Ogrn('1151232294621');

        $this->assertFalse($ogrn->validate());
    }

    public function testValidOgrnip()
    {
        $ogrn = new Ogrn('315850060115160');

        $this->assertFalse($ogrn->validate());
    }

    public function testNotDigit()
    {
        $ogrn = new Ogrn('abcabcabcabc1');

        $this->assertFalse($ogrn->validate());
    }
}
