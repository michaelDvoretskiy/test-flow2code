<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface CountryRepositoryInterface
{
    public function getAll(): Collection;
}
