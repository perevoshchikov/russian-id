<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\PersonInn;
use PHPUnit\Framework\TestCase;

class PersonInnTest extends TestCase
{
    public function invalidInnProvider(): array
    {
        return [
            ['500100732250'],
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
        $this->assertTrue((new PersonInn())->__invoke('500100732259'));
    }

    /**
     * @dataProvider invalidInnProvider
     */
    public function testInvalid($value): void
    {
        $this->assertFalse((new PersonInn())->__invoke($value));
    }
}
