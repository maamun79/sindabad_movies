@extends('layouts.main')

@section('content')
    <h4 class="mt-4 mb-0 font-weight-bold">POPULAR MOVIES</h4>
    <div class="row">
        {{-----------------------sidebar----------------------}}
        @include('movies.inc.sidebar')
        {{-------------------contents---------------------}}
        <main role="main" class="col-md-9 ml-sm-auto col-lg-9 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3">
                <div class="row">
                    @foreach($movies as $movie)
                        <div class="col-lg-3 col-md-4 col-sm-2">
                            <div class="smov-movie-list">
                                <a href="{{ route('movies.show', $movie['id']) }}">
                                    <img src="{{ 'https://image.tmdb.org/t/p/w500/'.$movie['poster_path'] }}" alt="" style="width:100%">
                                </a>
                                <div class="p-2 text-left">
                                    <a href="{{ route('movies.show', $movie['id']) }}" class="smov-movie-title"><h5>{{ $movie['title'] }}</h5></a>
                                    <small>{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }}</small>
                                    <br>
                                    <small>
                                        @foreach($movie['genre_ids'] as $mGenre)
                                            {{ $movieGenres->get($mGenre) }}{{(!$loop->last?',':'')}}
                                        @endforeach
                                    </small>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>{{--end content--}}
        </main>
    </div>

@endsection