<?php

namespace Anper\RussianId\Tests;

use Anper\RussianId\Oms;
use PHPUnit\Framework\TestCase;

class OmsTest extends TestCase
{
    public function testValid()
    {
        $this->assertTrue((new Oms())->__invoke('2341998071655749'));
    }

    public function testInvalidLenth()
    {
        $this->assertFalse((new Oms())->__invoke('123'));
    }

    public function testNotDigit()
    {
        $this->assertFalse((new Oms())->__invoke('234199807165574a'));
    }

    public function testInvalid()
    {
        $this->assertFalse((new Oms())->__invoke('2341998071655740'));
    }
}
