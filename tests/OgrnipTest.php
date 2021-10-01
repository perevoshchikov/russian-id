<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Ogrnip;
use PHPUnit\Framework\TestCase;

class OgrnipTest extends TestCase
{
    public function validOgrnipProvider(): array
    {
        return [
            ['315850060115169'], // orgnip
            ['314833285032522'], // orgnip, checksum more 9
        ];
    }

    public function invalidOgrnipProvider(): array
    {
        return [
            ['315850060115160'],
            ['314833285032520'],
            ['31483328503252a'],
            ['123abc'],
            [1],
            [[]],
            [null],
            [1.0],
            [new \DateTime()],
        ];
    }

    /**
     * @dataProvider validOgrnipProvider
     */
    public function testValid($value): void
    {
        $this->assertTrue((new Ogrnip())->__invoke($value));
    }

    /**
     * @dataProvider invalidOgrnipProvider
     */
    public function testInvalid($value): void
    {
        $this->assertFalse((new Ogrnip())->__invoke($value));
    }
}
