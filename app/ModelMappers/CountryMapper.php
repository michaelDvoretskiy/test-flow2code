<?php

namespace App\ModelMappers;

use App\Models\Country;

class CountryMapper
{
    public function __invoke(Country $elem): array
    {
        return [
            'id' => $elem->id,
            'name' => $elem->name,
        ];
    }
}
