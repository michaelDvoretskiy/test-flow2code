<?php

namespace App\ModelMappers;

use App\Models\MovieType;

class MovieTypeMapper
{
    public function __invoke(MovieType $elem)
    {
        return [
            'id' => $elem->id,
            'name' => $elem->name,
        ];
    }
}
