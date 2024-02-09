<?php

namespace App\Services;

use App\Interfaces\CountryRepositoryInterface;
use App\Interfaces\CountryServiceInretface;
use App\ModelMappers\CountryMapper;
use Illuminate\Support\Collection;

class CountryService implements CountryServiceInretface
{
    public function __construct(
        private CountryMapper $countryMapper,
        private CountryRepositoryInterface $countryRepository
    )
    {
    }

    public function getCountries(): Collection
    {
        $countries = $this->countryRepository->getAll();
        return $countries->map(
            $this->countryMapper
        );
    }
}
