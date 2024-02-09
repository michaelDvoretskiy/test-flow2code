<?php

namespace App\Repositories;

use App\Interfaces\CountryRepositoryInterface;
use App\Models\Country;
use Illuminate\Support\Collection;

class CountryRepository implements CountryRepositoryInterface
{
    public function getAll(): Collection
    {
        return Country::all();
    }
}
