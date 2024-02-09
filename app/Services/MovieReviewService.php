<?php

namespace App\Services;

use App\Interfaces\MovieReviewServiceInretface;
use App\Models\MovieReview;

class MovieReviewService implements MovieReviewServiceInretface
{
    public function createMovieReview(array $movieReviewData): int
    {
        $movieReview = new MovieReview();
        $movieReview->description = $movieReviewData['description'];
        $movieReview->username = $movieReviewData['username'];
        $movieReview->mark = $movieReviewData['mark'];
        $movieReview->movie_id = $movieReviewData['movieId'];
        $movieReview->save();

        return $movieReview->id;
    }
}
