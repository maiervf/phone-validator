<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Core\Domain\PhoneNumber\PhoneNumberEntity;

class PhoneEntityTest extends TestCase
{
    public function testMustNotCreateClassWithEmptyPhone()
    {
        $phoneNumber = "";
        $this->expectException(\Exception::class);
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
    }

    public function testMustNotCreateClassWithInvalidPhone()
    {
        $phoneNumber = "421923456";
        $this->expectException(\Exception::class);
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
    }

    public function testMustCreateClassWithWellFormatedPhone()
    {
        $phoneNumber = "(251) 116295876000000";
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
        $this->assertInstanceOf(PhoneNumberEntity::class, $phoneEntity);
    }

    public function testMustShowNokToInvalidPhone()
    {
        $phoneNumber = "(251) 116295876000000";
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
        $this->assertEquals($phoneEntity->isValidNumber(), "NOK");
    }

    public function testMustShowOkToValidPhone()
    {
        $phoneNumber = "(251) 116295876";
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
        $this->assertEquals($phoneEntity->isValidNumber(), "OK");
    }

    public function testMustShowCountryNameOfValidPhone()
    {
        $phoneNumber = "(251) 116295876";
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
        $this->assertEquals($phoneEntity->getCountryName(), "Ethiopia");

        $phoneNumber = "(212) 524447910";
        $phoneEntity = new PhoneNumberEntity($phoneNumber);
        $this->assertEquals($phoneEntity->getCountryName(), "Morocco");
    }
}
