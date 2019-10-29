<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\MovieReview;

class Movie extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * Get the users that relate to the org.
     */
    public function reviews()
    {
        return $this->hasMany(MovieReview::class, 'movie_id', 'id');
    }
}
