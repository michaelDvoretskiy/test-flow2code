<?php

namespace App\Http\Controllers;

use App\Exceptions\MovieNotFoundException;
use App\Http\Requests\MovieCoverRequest;
use App\Http\Requests\MovieDataRequest;
use App\Interfaces\MovieServiceInretface;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function __construct(private MovieServiceInretface $movieService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = $request->get('title', '');
        return $this->movieService->getMovies($title);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return ['message' => 'no UI is here'];
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieDataRequest $request)
    {
        $movieData = $request->validated();
        $id = $this->movieService->createMovie($movieData);

        return [
            'status' => true,
            'message' =>"Movie was created successfully",
            'movieId' => $id
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        try {
            return $this->movieService->getMovie($id);
        } catch(MovieNotFoundException $e) {
            $this->throw404($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        return ['message' => 'no UI is here'];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MovieDataRequest $request, int $id)
    {
        $movieData = $request->validated();
        try {
            $this->movieService->updateMovie($id, $movieData);
        } catch(MovieNotFoundException $e) {
            $this->throw404($e->getMessage());
        }

        return [
            'status' => true,
            'message' =>"The movie was updated successfully",
            'movieId' => $id
        ];
    }

    public function updateCover(MovieCoverRequest $request, int $id)
    {
        try {
            $this->movieService->storeMovieCover($id, $request->file('coverFile'));
        } catch(MovieNotFoundException $e) {
            $this->throw404($e->getMessage());
        }

        return [
            'status' => true,
            'message' =>"Cover for the movie was updated successfully",
            'movieId' => $id
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        try {
            $this->movieService->removeMovie($id);
        } catch(MovieNotFoundException $e) {
            $this->throw404($e->getMessage());
        }

        return [
            'success' => true,
            'message' =>"The movie was removed successfully",
            'movieId' => $id
        ];
    }

    private function throw404(string $message)
    {
        throw new HttpResponseException(
            response()->json([
                'status' => false,
                'message' => $message,
            ])->setStatusCode(404)
        );
    }
}
