<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\PhoneNumberService;

class PhoneNumbersController extends Controller
{
    private $phoneNumber;

    public function __construct(PhoneNumberService $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function index(Request $request) : View
    {
         return view('phoneNumber.index', [
            'phoneNumbers' => $this->phoneNumber->paginate(10)
        ]);
    }
}
