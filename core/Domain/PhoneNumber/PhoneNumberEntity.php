<?php

namespace Core\Domain\PhoneNumber;

use Core\Domain\PhoneNumber\PhoneNumberInterface;
use Core\Domain\PhoneNumber\PhoneNumberFactory;

class PhoneNumberEntity
{
	private $phoneNumber;
	private $countryName;
	private $countryCode;
	private $rawNumber;
	private PhoneNumberInterface $countryPhone;

	public function __construct(string $phoneNumber)
	{
		$this->phoneNumber = $phoneNumber;
		$this->checkFormat();
		$this->splitNumber();
		$this->countryPhone = PhoneNumberFactory::createValidatorByCountry(
			$this->countryCode
		);
	}

	private function checkFormat()
	{
		$invalidNumber = (empty($this->phoneNumber)) 
			|| strpos($this->phoneNumber, ') ') === false;

		if ($invalidNumber) {
			throw new \Exception("Invalid number format", 1);
		}
	}

	private function splitNumber()
	{
		[$countryCode, $this->rawNumber] = explode(') ', $this->phoneNumber);
		$this->countryCode = ltrim($countryCode, '(');
	}

	public function isValidNumber()
	{
		$valid = $this->countryPhone->validateNumber($this->rawNumber);
		return $valid ? 'OK' : 'NOK';
	}

	public function getCountryCode()
	{
		return $this->countryCode;
	}

	public function getRawNumber()
	{
		return $this->rawNumber;
	}

	public function getCountryName()
	{
		return $this->countryPhone->getName();
	}
}
