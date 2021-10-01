<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Bik;
use PHPUnit\Framework\TestCase;

class BikTest extends TestCase
{
    public function invalidKppProvider(): array
    {
        return [
            ['04452522a'],
            ['04452522'],
            ['0445252255'],
            ['0'],
            [1],
            [[]],
            [null],
            [1.0],
            [new \DateTime()],
        ];
    }

    public function validKppProvider(): array
    {
        return [
            ['044525225'],
            [144525225],
        ];
    }

    /**
     * @dataProvider invalidKppProvider
     */
    public function testInvalid($value): void
    {
        $this->assertFalse((new Bik())->__invoke($value));
    }

    /**
     * @dataProvider validKppProvider
     */
    public function testValidKpp($value): void
    {
        $this->assertTrue((new Bik())->__invoke($value));
    }
}
