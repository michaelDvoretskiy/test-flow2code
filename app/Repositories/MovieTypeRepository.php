<?php

namespace App\Repositories;

use App\Interfaces\MovieTypeRepositoryInterface;
use App\Models\MovieType;

class MovieTypeRepository implements MovieTypeRepositoryInterface
{
    public function getAll()
    {
        return MovieType::all();
    }
}
