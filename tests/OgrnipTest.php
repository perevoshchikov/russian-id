<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Ogrnip;
use PHPUnit\Framework\TestCase;

class OgrnipTest extends TestCase
{
    public function ogrnipProvider(): array
    {
        return [
            ['315850060115169'], // orgnip
            ['314833285032522'], // orgnip, checksum more 9
        ];
    }

    /**
     * @dataProvider ogrnipProvider
     * @param string $value
     */
    public function testValid(string $value): void
    {
        $this->assertTrue((new Ogrnip())->__invoke($value));
    }

    public function testInvalidLenth(): void
    {
        $this->assertFalse((new Ogrnip())->__invoke('0'));
    }

    public function testInvalidOgrnip(): void
    {
        $this->assertFalse((new Ogrnip())->__invoke('315850060115160'));
    }

    public function testNotDigit(): void
    {
        $this->assertFalse((new Ogrnip())->__invoke('abcabcabcabc1'));
    }
}
