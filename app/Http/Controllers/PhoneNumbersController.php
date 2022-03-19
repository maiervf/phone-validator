<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Services\PhoneNumberService;

class PhoneNumbersController extends Controller
{
    private $phoneNumber;
    private $countryList = [
        '237' => 'Cameroon',
        '251' => 'Ethiopia',
        '212' => 'Morocco',
        '258' => 'Mozambique',
        '256' => 'Uganda'
    ];

    public function __construct(PhoneNumberService $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function index(Request $request) : View
    {
        $paginator = $this->phoneNumber->paginate(
            $request->all(),
            $request->url(),
            $request->query()
        );

        return view('phoneNumber.index', [
            'phoneNumbers' => $paginator,
            'countries' => $this->countryList
        ]);
    }
}
