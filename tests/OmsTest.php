<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Oms;
use PHPUnit\Framework\TestCase;

class OmsTest extends TestCase
{
    public function testValid()
    {
        $oms = new Oms('2341998071655749');

        $this->assertTrue($oms->validate());
    }

    public function testInvalidLenth()
    {
        $oms = new Oms('123');

        $this->assertFalse($oms->validate());
    }

    public function testNotDigit()
    {
        $oms = new Oms('234199807165574a');

        $this->assertFalse($oms->validate());
    }

    public function testInvalid()
    {
        $oms = new Oms('2341998071655740');

        $this->assertFalse($oms->validate());
    }
}
