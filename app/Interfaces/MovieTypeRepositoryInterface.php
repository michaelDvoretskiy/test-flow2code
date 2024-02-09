<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface MovieTypeRepositoryInterface
{
    public function getAll(): Collection;
}
