<?php

namespace App\ModelMappers;

use App\Models\Country;

class CountryMapper
{
    public function __invoke(Country $elem)
    {
        return [
            'id' => $elem->id,
            'name' => $elem->name,
        ];
    }
}
