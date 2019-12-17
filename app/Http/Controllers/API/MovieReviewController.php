<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\MovieReview;
use App\Helpers\HTTPResponseHelper;

class MovieReviewController extends Controller
{

    /**
     * @var MovieReview
     */
    protected $movieReview;

    /**
     * @var HTTPResponseHelper
     */
    protected $httpResponseHelper;

    /**
     * MovieReviewController constructor.
     *
     * @param MovieReview $movieReview
     */
    public function __construct(
        MovieReview $movieReview,
        HTTPResponseHelper $httpResponseHelper)
    {
        $this->movieReview = $movieReview;
        $this->httpResponseHelper = $httpResponseHelper;
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
            return response()->json($this->httpResponseHelper->formatMessageForJson('Movie Not Found'), 422);
        }

        return response()->json($movie->reviews->sortByDesc('id')->values());
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
