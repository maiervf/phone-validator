<?php

namespace Core\Domain\PhoneNumber\Countries;
use Core\Domain\PhoneNumber\PhoneNumberInterface;

class EthiopiaPhone implements PhoneNumberInterface
{
	private $countryCode = '251';

	public function validateNumber($number) : bool
	{
		$fullNumber = "{$this->countryCode} {$number}";
		$valid = preg_match("/251 ?[1-59]\d{8}$/", $fullNumber);
		return $valid == 1 ? true : false;
	}

	public function getName() : string
	{
		return 'Ethiopia';
	}
}
