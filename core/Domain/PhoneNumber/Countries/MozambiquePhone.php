<?php

namespace Core\Domain\PhoneNumber\Countries;
use Core\Domain\PhoneNumber\PhoneNumberInterface;

class MozambiquePhone implements PhoneNumberInterface
{
	private $countryCode = '258';

	public function validateNumber($number) : bool
	{
		$fullNumber = "{$this->countryCode} {$number}";
		$valid = preg_match("/258 ?[28]\d{7,8}$/", $fullNumber);
		return $valid == 1 ? true : false;
	}

	public function getName() : string
	{
		return 'Mozambique';
	}
}
