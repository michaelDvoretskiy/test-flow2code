<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function types()
    {
        return $this->belongsToMany(
            MovieType::class,
            'movie_movie_type',
            'movie_id',
            'movie_type_id'
        );
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function reviews()
    {
        return $this->hasMany(MovieReview::class);
    }
}
