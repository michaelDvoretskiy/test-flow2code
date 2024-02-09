<?php

namespace App\Http\Controllers;

use App\Interfaces\CountryServiceInretface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

class CountryController extends Controller
{
    public function __construct(private CountryServiceInretface $countryService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->countryService->getCountries();
    }
}
