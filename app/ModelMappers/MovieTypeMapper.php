<?php

namespace App\ModelMappers;

use App\Models\MovieType;

class MovieTypeMapper
{
    public function __invoke(MovieType $elem): array
    {
        return [
            'id' => $elem->id,
            'name' => $elem->name,
        ];
    }
}
