<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Movie;
use App\Models\Genre;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index', compact('movies'));
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            // tambahan validasi untuk image
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'rating' => 'nullable|numeric|between:0,10',
            'production' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'release_date' => 'required|date',
            'age_restriction' => 'required|string|max:20',
            'playtime' => 'required|integer|min:1',
            'description' => 'required|string',
            'status' => 'required|in:available,unavailable,coming_soon',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        if ($request->hasFile('image_file')) {
            $imagePath = $request->file('image_file')->store('movies', 'public');
            $data['image'] = '/storage/' . $imagePath;
        }

        $data['rating'] = $data['rating'] ?? 'Not Rated';

        $movie = Movie::create($data);
        $movie->genres()->sync($data['genres']);

        return redirect()->route('movies.index')->with('success', 'Movie Created Successfully.');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            // tambahan validasi untuk image
            'image_file' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // max 2MB
            'rating' => 'nullable|numeric|between:0,10',
            'production' => 'required|string|max:255',
            'director' => 'required|string|max:255',
            'release_date' => 'required|date',
            'age_restriction' => 'required|string|max:20',
            'playtime' => 'required|integer|min:1',
            'description' => 'required|string',
            'status' => 'required|in:available,unavailable,coming_soon',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,id',
        ]);

        if ($request->hasFile('image_file')) {
            Storage::delete($movie->image); // Hapus gambar lama
            $imagePath = $request->file('image_file')->store('movies', 'public');
            $data['image'] = '/storage/' . $imagePath;
        }

        $data['rating'] = $data['rating'] ?? 'Not Rated';

        $movie->update($data);
        $movie->genres()->sync($data['genres']);

        return redirect()->route('movies.index')->with('success', 'Movie Edited Successfully.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index');
    }
}