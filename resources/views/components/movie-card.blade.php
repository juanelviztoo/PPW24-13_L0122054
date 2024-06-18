<div>
    <h2 class="h2-home">{{ $title }}</h2>
    <div class="row mb-5">
        @foreach($movies as $movie)
            <div class="col-md-3">
                <div class="card">
                    <img src="{{ $movie->image }}" class="card-img-top" alt="{{ $movie->title }}">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ $movie->title }}
                            <span class="float-right">
                                <i class="fas fa-star text-warning"></i> {{ $movie->rating }}
                            </span>
                        </h5>
                        <p class="card-text">
                            @foreach($movie->genres as $genre)
                                <span class="badge badge-{{ $badgeColor }}">{{ $genre->name }}</span>
                            @endforeach
                        </p>
                        <p class="card-text">{{ $movie->description }}</p>
                        <!-- <a href="{{ route('movies.show', $movie) }}" class="btn btn-primary">View</a> -->
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
