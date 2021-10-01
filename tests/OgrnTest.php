<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Ogrn;
use PHPUnit\Framework\TestCase;

class OgrnTest extends TestCase
{
    public function validOgrnProvider(): array
    {
        return [
            ['1151232294620'],   // orgn
            ['1138218667113'],   // orgn, checksum more 9
        ];
    }

    public function invalidOgrnipProvider(): array
    {
        return [
            ['1151232294621'],
            ['1138218667110'],
            ['113821866711a'],
            ['123abc'],
            [1],
            [[]],
            [null],
            [1.0],
            [new \DateTime()],
        ];
    }

    /**
     * @dataProvider validOgrnProvider
     */
    public function testValid(string $value): void
    {
        $this->assertTrue((new Ogrn())->__invoke($value));
    }

    /**
     * @dataProvider invalidOgrnipProvider
     */
    public function testInvalid($value): void
    {
        $this->assertFalse((new Ogrn())->__invoke($value));
    }
}
