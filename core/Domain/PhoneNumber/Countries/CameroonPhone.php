<?php

namespace Core\Domain\PhoneNumber\Countries;
use Core\Domain\PhoneNumber\PhoneNumberInterface;

class CameroonPhone implements PhoneNumberInterface
{
	private $countryCode = '237';

	public function isValidNumber($number)
	{
		$fullNumber = "{$this->countryCode} {$number}";
		$valid = preg_match("/237 ?[2368]\d{7,8}$/", $fullNumber);
		return $valid == 1 ? true : false;
	}
}
