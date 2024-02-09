<?php

namespace App\Interfaces;

use App\Models\Movie;

interface MovieRepositoryInterface
{
    public function getAll(string $title);
    public function getOne(int $id);
    public function removeOne(Movie $movie);
    public function setCover(Movie $movie, string $coverPath);
    public function update(Movie $movie, array $movieData);
}
