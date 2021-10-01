<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Oms;
use PHPUnit\Framework\TestCase;

class OmsTest extends TestCase
{
    public function invalidOmsProvider(): array
    {
        return [
            ['2341998071655740'],
            ['123'],
            ['123abc'],
            [1],
            [[]],
            [null],
            [1.0],
            [new \DateTime()],
        ];
    }

    public function testValid(): void
    {
        $this->assertTrue((new Oms())->__invoke('2341998071655749'));
    }

    /**
     * @dataProvider invalidOmsProvider
     */
    public function testInvalid($value): void
    {
        $this->assertFalse((new Oms())->__invoke($value));
    }
}
