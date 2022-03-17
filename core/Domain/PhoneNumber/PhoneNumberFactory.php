<?php

namespace Core\Domain\PhoneNumber;
use Core\Domain\PhoneNumber\Countries\CameroonPhone;
use Core\Domain\PhoneNumber\Countries\EthiopiaPhone;
use Core\Domain\PhoneNumber\Countries\MoroccoPhone;
use Core\Domain\PhoneNumber\Countries\MozambiquePhone;
use Core\Domain\PhoneNumber\Countries\UgandaPhone;


class PhoneNumberFactory
{
	public static function createPhoneByCountry($prefix)
	{
		switch ($prefix) {
			case 237:
				return new CameroonPhone();
			case 251:
				return new EthiopiaPhone();
			case 212:
				return new MoroccoPhone();
			case 258:
				return new MozambiquePhone();
			case 256:
				return new UgandaPhone();
		}
	}
}
