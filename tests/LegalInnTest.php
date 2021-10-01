<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\LegalInn;
use PHPUnit\Framework\TestCase;

class LegalInnTest extends TestCase
{
    public function invalidInnProvider(): array
    {
        return [
            ['7830002290'],
            ['1234567890'],
            ['123456789000'],
            ['0'],
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
        $this->assertTrue((new LegalInn())->__invoke('7830002293'));
    }

    /**
     * @dataProvider invalidInnProvider
     */
    public function testInvalid($value): void
    {
        $this->assertFalse((new LegalInn())->__invoke($value));
    }
}
