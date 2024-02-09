<?php

namespace App\Repositories;

use App\Interfaces\MovieTypeRepositoryInterface;
use App\Models\MovieType;
use Illuminate\Support\Collection;

class MovieTypeRepository implements MovieTypeRepositoryInterface
{
    public function getAll(): Collection
    {
        return MovieType::all();
    }
}
