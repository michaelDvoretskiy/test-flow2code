<?php

namespace App\Repositories;

use App\Interfaces\MovieRepositoryInterface;
use App\Models\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    public function getAll(string $title)
    {
        if (!$title) {
            return Movie::all();
        }
        return Movie::where('title', 'LIKE', '%' . $title . '%')->get();
    }

    public function getOne(int $id)
    {
        return Movie::find($id);
    }
    public function removeOne(Movie $movie)
    {
        $movie->delete();
    }
    public function setCover(Movie $movie, string $coverPath)
    {
        $movie->cover_path = $coverPath;
        $movie->save();
    }
    public function update(Movie $movie, array $movieData)
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
