<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MoviesController extends Controller
{
    public function index(){
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular')
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $movieGenres = collect($genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        return view('movies.index', [
            'movies'=> $movies,
            'genres'=> $genres,
            'movieGenres' => $movieGenres
        ]);

    }


    public function show($id){
        $movie = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/'.$id.'?append_to_response=credits,images,videos')
            ->json();

        return view('movies.show', [
            'movie'=> $movie
        ]);
    }


    public function movieWithGenre($id){
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/discover/movie?api_key=693e34727d53011af2c28d877cdf7243&with_genres='.$id)
            ->json()['results'];

        $genres = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $movieGenres = collect($genres)->mapWithKeys(function ($genre){
            return [$genre['id'] => $genre['name']];
        });

        return view('genres.index', [
            'movies' => $movies,
            'movieGenre' => $movieGenres[$id],
            'genres'=> $genres,
            'movieGenres' => $movieGenres
        ]);
    }
}
