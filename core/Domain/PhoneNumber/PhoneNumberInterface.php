<?php

namespace Core\Domain\PhoneNumber;

interface PhoneNumberInterface
{
	public function isValidNumber($number);
}
