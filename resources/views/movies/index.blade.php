@extends('layouts.app')

@section('content')
<div class="container">
    <h1 style="color:snow">Movies List</h1>
    <table class="table table-bordered table-hover table-responsive table-striped">
        <thead class="thead-light" style="text-align: center;">
            <tr>
                <th>Title</th>
                <th>Image</th>
                <th>Rating</th>
                <th>Producer</th>
                <th>Director</th>
                <th>Release Date</th>
                <th>Age Restriction</th>
                <th>Playtime</th>
                <th>Description</th>
                <th>Genres</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($movies as $movie)
                <tr style="color: snow;">
                    <td>{{ $movie->title }}</td>
                    <td><img src="{{ asset($movie->image) }}" alt="{{ $movie->title }}" width="100"></td>
                    <td>
                        <i class="fas fa-star text-warning"></i>
                        {{ $movie->rating ?? 'Not Rated' }}
                    </td>
                    <td>{{ $movie->production }}</td>
                    <td>{{ $movie->director }}</td>
                    <td>{{ $movie->release_date->format('M Y') }}</td>
                    <td>{{ $movie->age_restriction }}</td>
                    <td>{{ $movie->formatted_playtime }}</td>
                    <td>{{ Str::limit($movie->description, 200) }}</td>
                    <td>
                        @foreach($movie->genres as $genre)
                            <span class="badge badge-primary">{{ $genre->name }}</span>
                        @endforeach
                    </td>
                    <td>
                        @if($movie->status == 'available')
                            <i class="fas fa-circle text-success"></i> Available
                        @elseif($movie->status == 'unavailable')
                            <i class="fas fa-circle text-danger"></i> Unavailable
                        @else
                            <i class="fas fa-circle text-warning"></i> Coming Soon
                        @endif
                    </td>
                    <td>
                        <!-- <a href="{{ route('movies.show', $movie) }}" class="btn btn-info">View</a> -->
                        <a href="{{ route('movies.edit', $movie) }}" class="btn btn-warning mb-2">Edit</a>
                        <form action="{{ route('movies.destroy', $movie) }}" method="POST" style="display:inline-block;" class="delete-movie-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteForms = document.querySelectorAll('.delete-movie-form');
        
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                
                const confirmDelete = confirm('Are You Sure You Want to Delete this Movie? This Action Cannot be Undone.');
                
                if (confirmDelete) {
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
