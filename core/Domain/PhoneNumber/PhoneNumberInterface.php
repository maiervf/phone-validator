<?php

namespace Core\Domain\PhoneNumber;

interface PhoneNumberInterface
{
	public function validateNumber($number) : bool;
	public function getName() : string;
}
