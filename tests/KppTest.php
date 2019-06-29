<?php

namespace Anper\IdValidation\Tests;

use Anper\IdValidation\Kpp;
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
    public function testValid(string $value)
    {
        $kpp = new Kpp($value);

        $this->assertTrue($kpp->validate());
    }

    public function testInvalidKpp()
    {
        $kpp = new Kpp('123abc');

        $this->assertFalse($kpp->validate());
    }
}
