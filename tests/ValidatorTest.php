<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Validator;
use PHPUnit\Framework\TestCase;

class ValidatorTest extends TestCase
{
    public function testValidInnAsPerson(): void
    {
        $this->assertTrue(Validator::isInn('500100732259'));
    }

    public function testValidInnAsLegal(): void
    {
        $this->assertTrue(Validator::isInn('7830002293'));
    }

    public function testValidPerosnInn(): void
    {
        $this->assertTrue(Validator::isPersonInn('500100732259'));
    }

    public function testValidLegalInn(): void
    {
        $this->assertTrue(Validator::isLegalInn('7830002293'));
    }

    public function testInvalidInn(): void
    {
        $this->assertFalse(Validator::isInn('7830002291'));
    }

    public function testInvalidPersonInn(): void
    {
        $this->assertFalse(Validator::isPersonInn('500100732250'));
    }

    public function testInvalidLegalInn(): void
    {
        $this->assertFalse(Validator::isLegalInn('500100732250'));
    }

    public function testValidKpp(): void
    {
        $this->assertTrue(Validator::isKpp('514944513'));
    }

    public function testInvalidKpp(): void
    {
        $this->assertFalse(Validator::isKpp('51494451A'));
    }

    public function testValidKs(): void
    {
        $this->assertTrue(Validator::isKs('044030653', '30101810500000000653'));
    }

    public function testInvalidKs(): void
    {
        $this->assertFalse(Validator::isKs('044030653', '30101810500000000650'));
    }

    public function testValidRs(): void
    {
        $this->assertTrue(Validator::isRs('044030653', '40702810955230165464'));
    }

    public function testInvalidRs(): void
    {
        $this->assertFalse(Validator::isRs('044030653', '40702810955230165460'));
    }

    public function testValidOgrn(): void
    {
        $this->assertTrue(Validator::isOgrn('1138218667113'));
    }

    public function testInvalidOgrn(): void
    {
        $this->assertFalse(Validator::isOgrn('1138218667110'));
    }

    public function testInvalidOgrnip(): void
    {
        $this->assertFalse(Validator::isOgrn('315850060115169'));
    }

    public function testValidOms(): void
    {
        $this->assertTrue(Validator::isOms('2341998071655749'));
    }

    public function testInvalidOms(): void
    {
        $this->assertFalse(Validator::isOms('2341998071655740'));
    }

    public function testValidSnils(): void
    {
        $this->assertTrue(Validator::isSnils('11223344595'));
    }

    public function testInvalidSnils(): void
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
