<?php

namespace Core\Domain\PhoneNumber\Countries;
use Core\Domain\PhoneNumber\PhoneNumberInterface;

class MoroccoPhone implements PhoneNumberInterface
{
	private $countryCode = '212';

	public function validateNumber($number) : bool
	{
		$fullNumber = "{$this->countryCode} {$number}";
		$valid = preg_match("/212 ?[5-9]\d{8}$/", $fullNumber);
		return $valid == 1 ? true : false;
	}

	public function getName() : string
	{
		return 'Morocco';
	}
}
