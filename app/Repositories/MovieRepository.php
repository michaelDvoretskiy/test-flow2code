<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;
use Illuminate\Support\Collection;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll(string $title): Collection
    {
        if (!$title) {
            return Movie::all();
        }
        return Movie::where('title', 'LIKE', '%' . $title . '%')->get();
    }

    public function getOne(int $id): ?Movie
    {
        return Movie::find($id);
    }
    public function removeOne(Movie $movie): void
    {
        $movie->delete();
    }
    public function setCover(Movie $movie, string $coverPath): void
    {
        $movie->cover_path = $coverPath;
        $movie->save();
    }
    public function update(Movie $movie, array $movieData): void
    {
        $movie->title = $movieData['title'];
        $movie->description = $movieData['description'];
        $movie->country_id = $movieData['countryId'];
        $movie->save();

        $existingTypes = [];
        $typesToRemove = [];
        foreach($movie->types as $type) {
            if(!in_array($type->id,$movieData['types'])) {
                $typesToRemove[] = $type->id;
            } else {
                $existingTypes[] = $type->id;
            }
        }
        $newTypes = array_diff($movieData['types'], $existingTypes);

        $movie->types()->detach($typesToRemove);
        $movie->types()->attach($newTypes);
        $movie->save();
    }
}
