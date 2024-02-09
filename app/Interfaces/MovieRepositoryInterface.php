<?php

namespace App\Interfaces;

use App\Models\Movie;
use Illuminate\Support\Collection;

interface MovieRepositoryInterface
{
    public function getAll(string $title): Collection;
    public function getOne(int $id): ?Movie;
    public function removeOne(Movie $movie): void;
    public function setCover(Movie $movie, string $coverPath): void;
    public function update(Movie $movie, array $movieData): void;
}
