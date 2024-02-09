<?php

namespace App\Interfaces;

use App\Models\Movie;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

Interface MovieServiceInretface
{
    public function getMovies(string $title): Collection;
    public function getMovie(int $id): array;
    public function removeMovie(int $id): void;
    public function storeMovieCover(int $id, UploadedFile $file): void;
    public function createMovie(array $movieData): int;
    public function updateMovie(int $id, array $movieData): void;
}
