<?php

namespace App\Console\Commands;

use App\Models\Movie;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class InsertMovies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'insert:movies';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'If movie not exists then insert, else update movie information';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $movies = Http::withToken(config('services.tmdb.token'))
            ->get('https://api.themoviedb.org/3/movie/popular');

        $data = json_decode($movies, true);

        foreach ($data['results'] as $movie){
            $chek_existing = Movie::where('movie_id', $movie['id'])->get();

            if (count($chek_existing) > 0){
                //update
                $up_movie = Movie::where('movie_id', $movie)->first();
                $up_movie->movie_id          = $movie['id'];
                $up_movie->original_title    = $movie['original_title'];
                $up_movie->backdrop_path     = $movie['backdrop_path'];
                $up_movie->original_language = $movie['original_language'];
                $up_movie->overview          = $movie['overview'];
                $up_movie->popularity        = $movie['popularity'];
                $up_movie->poster_path       = $movie['poster_path'];
                $up_movie->release_date      = $movie['release_date'];
                $up_movie->title             = $movie['title'];
                $up_movie->vote_average      = $movie['vote_average'];
                $up_movie->vote_count        = $movie['vote_count'];

                $update = $up_movie->save();

                if ($update){
                    $this->info('Information updated about '.$movie['title'].' movie');
                }else{
                    $this->info('Error to update');
                }

            }else{
                //insert
                $insert_movie = new Movie();
                $insert_movie->movie_id          = $movie['id'];
                $insert_movie->original_title    = $movie['original_title'];
                $insert_movie->backdrop_path     = $movie['backdrop_path'];
                $insert_movie->original_language = $movie['original_language'];
                $insert_movie->overview          = $movie['overview'];
                $insert_movie->popularity        = $movie['popularity'];
                $insert_movie->poster_path       = $movie['poster_path'];
                $insert_movie->release_date      = $movie['release_date'];
                $insert_movie->title             = $movie['title'];
                $insert_movie->vote_average      = $movie['vote_average'];
                $insert_movie->vote_count        = $movie['vote_count'];

                $insert = $insert_movie->save();

                if ($insert){
                    $this->info('New movie '.$movie['title'].' added');
                }else{
                    $this->info('Error to add');
                }
            }
        }

    }
}
