<?php

namespace App\Interfaces;

use Illuminate\Http\UploadedFile;

Interface MovieReviewServiceInretface
{
    public function createMovieReview(array $movieReviewData);
}
