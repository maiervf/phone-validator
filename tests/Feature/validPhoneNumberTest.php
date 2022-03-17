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
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertFalse(
            $phoneNumber->isValidNumber('8002207200')
        );

        $this->assertFalse(
            $phoneNumber->isValidNumber('5')
        );

        $this->assertFalse(
            $phoneNumber->isValidNumber('')
        );

        $this->assertFalse(
            $phoneNumber->isValidNumber('555a885')
        );
    }

    public function testValidCameroonNumber()
    {
        $countryCode = '237';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertTrue(
            $phoneNumber->isValidNumber('695355911')
        );
        $this->assertTrue(
            $phoneNumber->isValidNumber('242452856')
        );
    }

    public function testInvalidEthiopiaNumber()
    {
        $countryCode = '251';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertFalse(
            $phoneNumber->isValidNumber('695355911')
        );
    }

    public function testValidEthiopiaNumber()
    {
        $countryCode = '251';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertTrue(
            $phoneNumber->isValidNumber('929044680')
        );
        $this->assertTrue(
            $phoneNumber->isValidNumber('116295876')
        );
    }

    public function testInvalidMoroccoNumber()
    {
        $countryCode = '212';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertFalse(
            $phoneNumber->isValidNumber('495355911')
        );
    }

    public function testValidMoroccoNumber()
    {
        $countryCode = '212';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertTrue(
            $phoneNumber->isValidNumber('522940082')
        );
        $this->assertTrue(
            $phoneNumber->isValidNumber('522207649')
        );
    }

    public function testInvalidMozambiqueNumber()
    {
        $countryCode = '258';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertFalse(
            $phoneNumber->isValidNumber('695355911')
        );
    }

    public function testValidMozambiqueNumber()
    {
        $countryCode = '258';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertTrue(
            $phoneNumber->isValidNumber('21759252')
        );
        $this->assertTrue(
            $phoneNumber->isValidNumber('823156001')
        );
    }

    public function testInvalidUgandaNumber()
    {
        $countryCode = '256';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertFalse(
            $phoneNumber->isValidNumber('6953559110')
        );
    }

    public function testValidUgandaNumber()
    {
        $countryCode = '256';
        $phoneNumber = PhoneNumberFactory::createPhoneByCountry($countryCode);

        $this->assertTrue(
            $phoneNumber->isValidNumber('705344416')
        );
        $this->assertTrue(
            $phoneNumber->isValidNumber('800220720')
        );
    }
}
