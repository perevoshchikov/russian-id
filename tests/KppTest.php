<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Kpp;
use PHPUnit\Framework\TestCase;

class KppTest extends TestCase
{
    public function kppProvider(): array
    {
        return [
            ['514944513'],
            ['0108A4934'],
            ['68314A288'],
            ['3963AZ668'],
        ];
    }

    /**
     * @dataProvider kppProvider
     * @param string $value
     */
    public function testValid(string $value): void
    {
        $this->assertTrue((new Kpp())->__invoke($value));
    }

    public function testInvalidKpp(): void
    {
        $this->assertFalse((new Kpp())->__invoke('123abc'));
    }
}
