<?php

namespace App\Services;
use App\Models\PhoneNumber;
use Core\Domain\PhoneNumber\PhoneNumberEntity;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class PhoneNumberService
{
	public function paginate($data, $url, $query)
	{
		$perPage = 10;
		$queryBuilder = new PhoneNumber();

		if (!empty($data['country'])) {
			$queryBuilder = $queryBuilder->where(
				'phone',
				'like',
				"%({$data['country']})%"
			);
		}

		$registers = $queryBuilder->get();
		$registers = $this->organizePhones($registers);

		// It needs to be filtered after find, to avoid regex on sql query
		if (!empty($data['valid'])) {
			$registers = $this->filterByPhoneStatus(
				$registers,
				$data['valid']
			);
		}

		$total = count($registers);
		$currentPage = $data["page"] ?? 1;
		$startingPoint = ($currentPage * $perPage) - $perPage;
		$data = $registers->slice($startingPoint, $perPage);
		return new Paginator($data, $total, $perPage, $currentPage, [
		    'path' => $url,
		    'query' => $query
		]);
	}

	private function organizePhones($registers)
	{
		if (!count($registers)) return $registers;
		$registers->map(function($item) {
			$phoneNumber = new PhoneNumberEntity($item->phone);
			$item->countryCode = $phoneNumber->getCountryCode();
			$item->rawNumber = $phoneNumber->getRawNumber();
			$item->status = $phoneNumber->isValidNumber();
			$item->country = $phoneNumber->getCountryName();
		});
		return $registers;
	}

	private function filterByPhoneStatus($registers, $validFilter)
	{
		if (!count($registers)) return $registers;
		foreach ($registers as $key => $value) {
			if ($value->status == $validFilter) continue;
			unset($registers[$key]);
		}
		return $registers;
	}
}
