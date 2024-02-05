<?php

namespace App\Http\Controllers;

use App\Interfaces\MovieTypeServiceInretface;

class MovieTypeController extends Controller
{

    public function __construct(private MovieTypeServiceInretface $movieTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->movieTypeService->getMovieTypes();
    }
}
