<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function validProvider(): array
    {
        return [
            ['isBik', ['044030653']],
            ['isRs', ['044030653', '40702810955230165464']],
            ['isKs', ['044030653', '30101810500000000653']],
            ['isInn', ['7830002293']],
            ['isInn', ['500100732259']],
            ['isLegalInn', ['7830002293']],
            ['isPersonInn', ['500100732259']],
            ['isKpp', ['514944513']],
            ['isOgrn', ['1151232294620']],
            ['isOgrnip', ['315850060115169']],
            ['isOgrnOrOgrnip', ['315850060115169']],
            ['isOgrnOrOgrnip', ['1151232294620']],
            ['isOms', ['2341998071655749']],
            ['isSnils', ['11223344595']],
        ];
    }

    public function invalidProvider(): array
    {
        return [
            ['isBik', ['0']],
            ['isRs', ['044030653', '0']],
            ['isKs', ['044030653', '0']],
            ['isRs', ['0', '40702810955230165464']],
            ['isKs', ['0', '30101810500000000653']],
            ['isInn', ['0']],
            ['isInn', ['0']],
            ['isLegalInn', ['0']],
            ['isPersonInn', ['0']],
            ['isKpp', ['0']],
            ['isOgrn', ['0']],
            ['isOgrnip', ['0']],
            ['isOgrnOrOgrnip', ['0']],
            ['isOgrnOrOgrnip', ['0']],
            ['isOms', ['0']],
            ['isSnils', ['0']],
        ];
    }

    /**
     * @dataProvider validProvider
     */
    public function testValid(string $method, array $args): void
    {
        $this->assertTrue(\call_user_func_array([Validator::class, $method], $args));
    }

    /**
     * @dataProvider invalidProvider
     */
    public function testInvalid(string $method, array $args): void
    {
        $this->assertFalse(\call_user_func_array([Validator::class, $method], $args));
    }
}
