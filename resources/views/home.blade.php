@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="jumbotron text-center">
        <h1>Welcome to Box Movies</h1>
        <h5>Venture Out and Find Your Own Version of The Best Movies.
            I've Provided a Variety of Typical Ones that You can Check Out, Hopefully You'll Find it!</h5>
    </div>

    @component('components.movie-card', [
        'title' => 'Fresh Best Movies',
        'movies' => $bestAvailMovies,
        'badgeColor' => 'info'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Extraordinary Smash Hit Movies',
        'movies' => $extraordinaryMovies,
        'badgeColor' => 'danger'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Top Movies of All Time',
        'movies' => $topMovies,
        'badgeColor' => 'success'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Old Fashioned Movies',
        'movies' => $oldFashionedMovies,
        'badgeColor' => 'primary'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Even If It\'s Underrated, Maybe You Like These Movies?',
        'movies' => $underratedMovies,
        'badgeColor' => 'warning'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Shortest-Length Movies to Savor',
        'movies' => $shortestMovies,
        'badgeColor' => 'danger'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Long-Duration Movies to Discover',
        'movies' => $longestMovies,
        'badgeColor' => 'success'
    ])@endcomponent

    @component('components.movie-card', [
        'title' => 'Coming Soon Movies',
        'movies' => $comingSoon,
        'badgeColor' => 'info'
    ])@endcomponent
</div>
@endsection