<?php

namespace App\ModelMappers;

use App\Models\Movie;

class MovieListMapper
{
    public function __invoke(Movie $elem): array
    {
        return [
            'id' => $elem->id,
            'title' => $elem->title,
            'description' => $elem->description,
            'imgPath' => $elem->cover_path ? config('app.image_base_path') . $elem->cover_path : null
        ];
    }
}
