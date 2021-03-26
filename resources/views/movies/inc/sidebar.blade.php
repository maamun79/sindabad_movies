<nav class="col-md-3 d-none d-md-block bg-light sidebar smov-sidebar">
    <div class="sidebar-sticky">
        <h4 class="text-left mt-3">Genres/Categories</h4>
        <ul class="smov-genre-main p-0">
            <li class="smov-genres {{ request()->is('/') ? 'active' : '' }}">
                <a class="smov-genre" href="{{ url('/') }}">
                    Popular
                </a>
            </li>
            @foreach($genres as $genre)
                <li class="smov-genres {{ request()->is('genres/'.$genre['id'].'/movie') ? 'active' : '' }}">
                    <a class="smov-genre" href="{{ route('genres.movie', $genre['id']) }}">
                        {{ $genre['name'] }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</nav>