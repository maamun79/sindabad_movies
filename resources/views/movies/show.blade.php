@extends('layouts.main')

@section('content')
    <div class="row mt-5 mb-5">
        {{-------------------contents---------------------}}
        <div class="col-lg-4 col-md-4 col-sm-6">
            <img src="{{ 'https://image.tmdb.org/t/p/w300/'.$movie['poster_path'] }}" alt="{{ $movie['title'] }}">
        </div>
        <div class="col-lg-8 col-md-8 col-sm-6">
            <h2>{{ $movie['title'] }}</h2>
            <p class="text-muted">
                <svg height="13pt" viewBox="0 -10 511.98685 511" width="13pt" xmlns="http://www.w3.org/2000/svg"><path d="m510.652344 185.902344c-3.351563-10.367188-12.546875-17.730469-23.425782-18.710938l-147.773437-13.417968-58.433594-136.769532c-4.308593-10.023437-14.121093-16.511718-25.023437-16.511718s-20.714844 6.488281-25.023438 16.535156l-58.433594 136.746094-147.796874 13.417968c-10.859376 1.003906-20.03125 8.34375-23.402344 18.710938-3.371094 10.367187-.257813 21.738281 7.957031 28.90625l111.699219 97.960937-32.9375 145.089844c-2.410156 10.667969 1.730468 21.695313 10.582031 28.09375 4.757813 3.4375 10.324219 5.1875 15.9375 5.1875 4.839844 0 9.640625-1.304687 13.949219-3.882813l127.46875-76.183593 127.421875 76.183593c9.324219 5.609376 21.078125 5.097657 29.910156-1.304687 8.855469-6.417969 12.992187-17.449219 10.582031-28.09375l-32.9375-145.089844 111.699219-97.941406c8.214844-7.1875 11.351563-18.539063 7.980469-28.925781zm0 0" fill="#ffc107"/></svg>
                <span class="mt-1">{{ $movie['vote_average']*10 .'%' }}</span> |
                <span class="mt-1">{{ \Carbon\Carbon::parse($movie['release_date'])->format('M d, Y') }} </span> |
                <span>
                    @foreach($movie['genres'] as $mGenre)
                        {{ $mGenre['name'] }}{{(!$loop->last?',':'')}}
                    @endforeach
                </span>

            </p>

            <h5>Overview</h5>
            <p class="text-justify">
                {{ $movie['overview'] }}
            </p>

            <div class="row mt-5">
                @foreach($movie['credits']['crew'] as $crew)
                    @if($loop->index < 6)
                        <div class="col-md-4">
                            <h5>{{ $crew['name'] }}</h5>
                            <p>{{ $crew['job'] }}</p>
                        </div>
                    @endif
                @endforeach
            </div>
            @if(count($movie['videos']['results']) > 0)
                <a href="https://youtube.com/watch?v={{$movie['videos']['results'][0]['key']}}" target="_blank" class="btn btn-primary">
                    Play Trailer
                </a>
            @endif
        </div>
    </div>
    <h3 class="font-weight-bold">CAST</h3>
    <hr>
    <div class="row mb-5">
        @foreach($movie['credits']['cast'] as $cast)
            @if($loop->index < 4)
                <div class="col-md-3">
                    <div class="smov-actor-list">
                        <img src="{{ 'https://image.tmdb.org/t/p/w300'.$cast['profile_path'] }}" alt="{{$cast['name']}}">
                        <div class="p-2 text-left">
                            <h5>{{$cast['name']}}</h5>
                            <p>{{$cast['character']}}</p>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

@endsection