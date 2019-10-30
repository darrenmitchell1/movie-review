<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieReview;

class MovieReviewController extends Controller
{

    /**
     * @var MovieReview
     */
    protected $movieReview;

    /**
     * MovieReviewController constructor.
     *
     * @param MovieReview $movieReview
     */
    public function __construct(
        MovieReview $movieReview)
    {
        $this->movieReview = $movieReview;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response JSON
     */
    public function index(Request $request)
    {
        $movie = Movie::with(['reviews'])->find($request->movie);

        if(empty($movie)) {
            return response()->json(['message' => 'Movie Not Found', 'errors' => ''], 422);
        }

        return response()->json($movie->reviews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response JSON
     */
    public function store(Request $request)
    {
        $request->validate($this->movieReview->getCreateRules());

        $this->movieReview->fill($request->all());

        $this->movieReview->save();

        return response()->json($this->movieReview);
    }

}
