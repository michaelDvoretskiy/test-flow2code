<?php

namespace App\Services;

use App\Exceptions\MovieNotFoundException;
use App\Interfaces\MovieRepositoryInterface;
use App\Interfaces\MovieServiceInretface;
use App\ModelMappers\MovieListMapper;
use App\ModelMappers\MovieMapper;
use App\Models\Movie;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

class MovieService implements MovieServiceInretface
{
    public function __construct(
        private MovieListMapper $movieListMapper,
        private MovieMapper $movieMapper,
        private FileService $fileService,
        private MovieRepositoryInterface $movieRepository
    )
    {
    }

    public function getMovies(string $title): Collection
    {
        $movies = $this->movieRepository->getAll($title);
        return $movies->map(
            $this->movieListMapper
        );
    }

    public function getMovie(int $id): array
    {
        return ($this->movieMapper)($this->findMovieOrException($id));
    }

    public function removeMovie(int $id): void
    {
        $movie = $this->findMovieOrException($id);
        $this->fileService->removeMovieCover($movie->cover_path);
        $this->movieRepository->removeOne($movie);
    }

    public function storeMovieCover(int $id, UploadedFile $file): void
    {
        $movie = $this->findMovieOrException($id);
        if ($movie->cover_path ?? false) {
            $this->fileService->removeMovieCover($movie->cover_path);
        }
        $fileName = $this->fileService->storeMovieCover($file);
        $this->movieRepository->setCover($movie, $fileName);
    }

    public function createMovie(array $movieData): int
    {
        $movie = new Movie();
        $this->movieRepository->update($movie, $movieData);

        return $movie->id;
    }

    public function updateMovie(int $id, array $movieData): void
    {
        $this->movieRepository->update($this->findMovieOrException($id), $movieData);
    }

    private function findMovieOrException(int $id): ?Movie
    {
        $movie = $this->movieRepository->getOne($id);
        if (!$movie) {
            throw new MovieNotFoundException('The movie not found');
        }
        return $movie;
    }
}
