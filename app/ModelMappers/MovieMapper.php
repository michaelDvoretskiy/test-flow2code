<?php

namespace App\ModelMappers;

use App\Models\Movie;

class MovieMapper
{
    public function __construct(
        private CountryMapper $countryMapper,
        private MovieTypeMapper $movieTypeMapper,
        private MovieReviewMapper $movieReviewMapper
    )
    {
    }

    public function __invoke(Movie $elem): array
    {
        return [
            'id' => $elem->id,
            'title' => $elem->title,
            'description' => $elem->description,
            'imgPath' => $elem->cover_path ? config('app.image_base_path') . $elem->cover_path : null,
            'types' => $elem->types->map($this->movieTypeMapper),
            'country' => ($this->countryMapper)($elem->country),
            'reviews' => $elem->reviews->map($this->movieReviewMapper)
        ];
    }
}
