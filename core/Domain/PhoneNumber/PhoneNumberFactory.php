<?php

namespace Core\Domain\PhoneNumber;
use Core\Domain\PhoneNumber\CameroonPhone;


class PhoneNumberFactory
{
	public static function createPhoneByCountry($prefix)
	{
		return new CameroonPhone();
	}
}
