<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Snils;
use PHPUnit\Framework\TestCase;

class SnilsTest extends TestCase
{
    public function validSnilsProvider(): array
    {
        return [
            ['112-233-445 95'], // with separators
            ['11223344595'],    // checksum less 100
            ['19702774500'],    // checksum more 101
            ['30025146900'],    // checksum is 101
            ['21204338300'],    // checksum is 100
        ];
    }

    public function invalidSnilsProvider(): array
    {
        return [
            ['11223344590'],
            ['0'],
            ['abcabcabca1'],
            [1],
            [[]],
            [null],
            [1.0],
            [new \DateTime()],
        ];
    }

    /**
     * @dataProvider validSnilsProvider
     */
    public function testValid($snils): void
    {
        $this->assertTrue((new Snils())->__invoke($snils));
    }

    /**
     * @dataProvider invalidSnilsProvider
     */
    public function testInvalid($snils): void
    {
        $this->assertFalse((new Snils())->__invoke($snils));
    }
}
