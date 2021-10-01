<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testValidInnAsPerson()
    {
        $this->assertTrue(Validator::isInn('500100732259'));
    }

    public function testValidInnAsLegal()
    {
        $this->assertTrue(Validator::isInn('7830002293'));
    }

    public function testValidPerosnInn()
    {
        $this->assertTrue(Validator::isPersonInn('500100732259'));
    }

    public function testValidLegalInn()
    {
        $this->assertTrue(Validator::isLegalInn('7830002293'));
    }

    public function testInvalidInn()
    {
        $this->assertFalse(Validator::isInn('7830002291'));
    }

    public function testInvalidPersonInn()
    {
        $this->assertFalse(Validator::isPersonInn('500100732250'));
    }

    public function testInvalidLegalInn()
    {
        $this->assertFalse(Validator::isLegalInn('500100732250'));
    }

    public function testValidKpp()
    {
        $this->assertTrue(Validator::isKpp('514944513'));
    }

    public function testInvalidKpp()
    {
        $this->assertFalse(Validator::isKpp('51494451A'));
    }

    public function testValidKs()
    {
        $this->assertTrue(Validator::isKs('044030653', '30101810500000000653'));
    }

    public function testInvalidKs()
    {
        $this->assertFalse(Validator::isKs('044030653', '30101810500000000650'));
    }

    public function testValidRs()
    {
        $this->assertTrue(Validator::isRs('044030653', '40702810955230165464'));
    }

    public function testInvalidRs()
    {
        $this->assertFalse(Validator::isRs('044030653', '40702810955230165460'));
    }

    public function testValidOgrn()
    {
        $this->assertTrue(Validator::isOgrn('1138218667113'));
    }

    public function testInvalidOgrn()
    {
        $this->assertFalse(Validator::isOgrn('1138218667110'));
    }

    public function testInvalidOgrnip()
    {
        $this->assertFalse(Validator::isOgrn('315850060115169'));
    }

    public function testValidOms()
    {
        $this->assertTrue(Validator::isOms('2341998071655749'));
    }

    public function testInvalidOms()
    {
        $this->assertFalse(Validator::isOms('2341998071655740'));
    }

    public function testValidSnils()
    {
        $this->assertTrue(Validator::isSnils('11223344595'));
    }

    public function testInvalidSnils()
    {
        $this->assertFalse(Validator::isSnils('11223344590'));
    }

    public function testValidBik(): void
    {
        $this->assertTrue(Validator::isBik('044525225'));
    }

    public function testInvalidBik(): void
    {
        $this->assertFalse(Validator::isBik('04452522a'));
    }
}
