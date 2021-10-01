<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Assert;
use Anper\RussianId\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class AssertTest extends TestCase
{
    public function validProvider(): array
    {
        return [
            ['bik', ['044030653']],
            ['rs', ['044030653', '40702810955230165464']],
            ['ks', ['044030653', '30101810500000000653']],
            ['inn', ['7830002293']],
            ['inn', ['500100732259']],
            ['legalInn', ['7830002293']],
            ['personInn', ['500100732259']],
            ['kpp', ['514944513']],
            ['ogrn', ['1151232294620']],
            ['ogrnip', ['315850060115169']],
            ['ogrnOrOgrnip', ['315850060115169']],
            ['ogrnOrOgrnip', ['1151232294620']],
            ['oms', ['2341998071655749']],
            ['snils', ['11223344595']],
        ];
    }

    public function invalidProvider(): array
    {
        return [
            ['bik', ['0']],
            ['rs', ['044030653', '0']],
            ['ks', ['044030653', '0']],
            ['rs', ['0', '40702810955230165464']],
            ['ks', ['0', '30101810500000000653']],
            ['inn', ['0']],
            ['inn', ['0']],
            ['legalInn', ['0']],
            ['personInn', ['0']],
            ['kpp', ['0']],
            ['ogrn', ['0']],
            ['ogrnip', ['0']],
            ['ogrnOrOgrnip', ['0']],
            ['ogrnOrOgrnip', ['0']],
            ['oms', ['0']],
            ['snils', ['0']],
        ];
    }

    /**
     * @dataProvider validProvider
     */
    public function testValid(string $method, array $args): void
    {
        $this->assertNull(\call_user_func_array([Assert::class, $method], $args));
    }

    /**
     * @dataProvider invalidProvider
     */
    public function testInvalid(string $method, array $args): void
    {
        $this->expectException(InvalidArgumentException::class);

        \call_user_func_array([Assert::class, $method], $args);
    }
}
