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
    public function testValid(string $snils): void
    {
        $this->assertTrue((new Snils())->__invoke($snils));
    }

    public function testInvalidInn(): void
    {
        $this->assertFalse((new Snils())->__invoke('11223344590'));
    }

    public function testInvalidLength(): void
    {
        $this->assertFalse((new Snils())->__invoke('0'));
    }

    public function testNotDigit(): void
    {
        $this->assertFalse((new Snils())->__invoke('abcabcabca1'));
    }
}
