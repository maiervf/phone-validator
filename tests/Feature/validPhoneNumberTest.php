<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Core\Domain\PhoneNumber\PhoneNumberFactory;

class validPhoneNumberTest extends TestCase
{

    public function testInvalidCameroonNumber()
    {
        $countryCode = '237';
        $number = '99999999';

        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);
        $isValid = $phoneNumber->isValidNumber($number);
        $this->assertFalse($isValid);
    }
}
