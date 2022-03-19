<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Core\Domain\PhoneNumber\PhoneNumberFactory;

class ValidPhoneNumberTest extends TestCase
{
    public function testInvalidCameroonNumber()
    {
        $countryCode = '237';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('8002207200')
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('5')
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('')
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('555a885')
        );
    }

    public function testValidCameroonNumber()
    {
        $countryCode = '237';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertTrue(
            $phoneNumber->validateNumber('695355911')
        );
        $this->assertTrue(
            $phoneNumber->validateNumber('242452856')
        );
    }

    public function testInvalidEthiopiaNumber()
    {
        $countryCode = '251';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('695355911')
        );
    }

    public function testValidEthiopiaNumber()
    {
        $countryCode = '251';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertTrue(
            $phoneNumber->validateNumber('929044680')
        );
        $this->assertTrue(
            $phoneNumber->validateNumber('116295876')
        );
    }

    public function testInvalidMoroccoNumber()
    {
        $countryCode = '212';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('495355911')
        );
    }

    public function testValidMoroccoNumber()
    {
        $countryCode = '212';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertTrue(
            $phoneNumber->validateNumber('522940082')
        );
        $this->assertTrue(
            $phoneNumber->validateNumber('522207649')
        );
    }

    public function testInvalidMozambiqueNumber()
    {
        $countryCode = '258';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('695355911')
        );
    }

    public function testValidMozambiqueNumber()
    {
        $countryCode = '258';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertTrue(
            $phoneNumber->validateNumber('21759252')
        );
        $this->assertTrue(
            $phoneNumber->validateNumber('823156001')
        );
    }

    public function testInvalidUgandaNumber()
    {
        $countryCode = '256';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertFalse(
            $phoneNumber->validateNumber('6953559110')
        );
    }

    public function testValidUgandaNumber()
    {
        $countryCode = '256';
        $phoneNumber = PhoneNumberFactory::createValidatorByCountry(
            $countryCode
        );

        $this->assertTrue(
            $phoneNumber->validateNumber('705344416')
        );
        $this->assertTrue(
            $phoneNumber->validateNumber('800220720')
        );
    }
}
