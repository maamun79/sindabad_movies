<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'movie_id',
        'original_title',
        'backdrop_path',
        'original_language',
        'overview',
        'popularity',
        'poster_path',
        'release_date',
        'title',
        'vote_average',
        'vote_count',
    ];
}
