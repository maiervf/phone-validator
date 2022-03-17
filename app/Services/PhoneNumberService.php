<?php

namespace App\Services;
use App\Models\PhoneNumber;
use Core\Domain\PhoneNumber\PhoneNumberEntity;

class PhoneNumberService
{
	public function paginate(int $registers)
	{
		$registers = PhoneNumber::paginate($registers);
		return $this->organizePhones($registers);
	}

	private function organizePhones($paginator)
	{
		if (empty($paginator->getCollection())) return $paginator;
		$paginator->getCollection()->map(function($item) {
			$phoneNumber = new PhoneNumberEntity($item->phone);
			$item->countryCode = $phoneNumber->getCountryCode();
			$item->rawNumber = $phoneNumber->getRawNumber();
			$item->status = $phoneNumber->isValidNumber();
			$item->country = $phoneNumber->getCountryName();
		});
		return $paginator;
	}
}
