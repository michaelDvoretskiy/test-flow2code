<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

Interface CountryServiceInretface
{
    public function getCountries(): Collection;
}
