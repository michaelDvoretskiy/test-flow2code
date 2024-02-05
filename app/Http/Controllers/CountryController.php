<?php

namespace App\Http\Controllers;

use App\Interfaces\CountryServiceInretface;

class CountryController extends Controller
{
    public function __construct(private CountryServiceInretface $countryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->countryService->getCountries();
    }
}
