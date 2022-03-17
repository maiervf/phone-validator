<?php

namespace Core\Domain\PhoneNumber;
use Core\Domain\PhoneNumber\PhoneNumberInterface;


class CameroonPhone implements PhoneNumberInterface
{
	private $countryCode = '+237';

	public function isValidNumber($number)
	{
		return true;
	}
}
