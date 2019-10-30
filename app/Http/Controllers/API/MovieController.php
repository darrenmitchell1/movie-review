<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Movie;

class MovieController extends Controller
{
    /**
     * @var Movie
     */
    protected $movie;

    /**
     * MovieController constructor.
     *
     * @param Movie $movie
     */
    public function __construct(
        Movie $movie)
    {
        $this->movie = $movie;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response JSON
     */
    public function index()
    {
        $movies = Movie::all();

        return response()->json($movies);
    }
 
}
