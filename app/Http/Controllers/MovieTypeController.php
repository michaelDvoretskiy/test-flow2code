<?php

namespace App\Http\Controllers;

use App\Interfaces\MovieTypeServiceInretface;
use Illuminate\Support\Collection;

class MovieTypeController extends Controller
{

    public function __construct(private MovieTypeServiceInretface $movieTypeService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): Collection
    {
        return $this->movieTypeService->getMovieTypes();
    }
}
