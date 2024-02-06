<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieCoverRequest;
use App\Http\Requests\MovieDataRequest;
use App\Http\Requests\MovieReviewDataRequest;
use App\Interfaces\MovieReviewServiceInretface;
use App\Interfaces\MovieServiceInretface;
use Illuminate\Http\Request;

class MovieReviewController extends Controller
{

    public function __construct(private MovieReviewServiceInretface $movieReviewService)
    {
    }

    public function store(MovieReviewDataRequest $request)
    {
        $movieReviewData = $request->validated();
        $id = $this->movieReviewService->createMovieReview($movieReviewData);

        return [
            'status' => true,
            'message' =>"Movie review was created successfully",
            'movieReviewId' => $id
        ];
    }
}
