<?php

namespace App\Interfaces;

use Illuminate\Http\UploadedFile;

Interface MovieServiceInretface
{
    public function getMovies(string $title);
    public function getMovie(int $id);
    public function removeMovie(int $id);
    public function storeMovieCover(int $id, UploadedFile $file);
    public function createMovie(array $movieData);
    public function updateMovie(int $id, array $movieData);
}
