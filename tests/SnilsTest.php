<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Snils;
use PHPUnit\Framework\TestCase;

class SnilsTest extends TestCase
{
    public function snilsProvider(): array
    {
        return [
            ['112-233-445 95'], // with separators
            ['11223344595'],    // checksum less 100
            ['19702774500'],    // checksum more 101
            ['30025146900'],    // checksum is 101
            ['21204338300'],    // checksum is 100
        ];
    }

    /**
     * @dataProvider snilsProvider
     * @param string $snils
     */
    public function testValid(string $snils)
    {
        $snils = new Snils($snils);

        $this->assertTrue($snils->validate());
    }

    public function testInvalidInn()
    {
        $snils = new Snils('11223344590');

        $this->assertFalse($snils->validate());
    }

    public function testInvalidLength()
    {
        $snils = new Snils('0');

        $this->assertFalse($snils->validate());
    }

    public function testNotDigit()
    {
        $snils = new Snils('abcabcabca1');

        $this->assertFalse($snils->validate());
    }
}
