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
        ];
    }

    /**
     * @dataProvider invalidKppProvider
     * @param string $value
     */
    public function testInvalid(string $value): void
    {
        $this->assertFalse((new Bik())->__invoke($value));
    }

    public function testValidKpp(): void
    {
        $this->assertTrue((new Bik())->__invoke('044525225'));
    }
}
