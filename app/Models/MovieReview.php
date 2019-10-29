<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;

class MovieReview extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'movie_id',
        'title',
        'review'
    ];

    protected $rules = [
        'movie_id'           => 'required | exists:movies,id',
        'title'              => 'required | max:60',
        'review'             => 'required | max:255',
    ];

    public function getCreateRules()
    {
        return $this->rules;
    }

    /**
     * Get the movie that this belongs to.
     */
    public function movie()
    {
        return $this->belongsTo(Movie::class, 'movie_id');
    }
}
