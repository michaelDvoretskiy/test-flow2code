<?php

namespace App\ModelMappers;

use App\Models\MovieReview;

class MovieReviewMapper
{
    public function __invoke(MovieReview $elem)
    {
        return [
            'id' => $elem->id,
            'username' => $elem->username,
            'mark' => $elem->mark,
            'description' => $elem->description
        ];
    }
}
