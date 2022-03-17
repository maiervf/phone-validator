<?php

namespace Core\Domain\PhoneNumber\Countries;
use Core\Domain\PhoneNumber\PhoneNumberInterface;

class UgandaPhone implements PhoneNumberInterface
{
	private $countryCode = '256';

	public function isValidNumber($number)
	{
		$fullNumber = "{$this->countryCode} {$number}";
		$valid = preg_match("/256 ?\d{9}$/", $fullNumber);
		return $valid == 1 ? true : false;
	}
}
