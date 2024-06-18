<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
{
    /**
     * Show the form for creating a new genre.
     *
     */
    public function create()
    {
        return view('genres.create');
    }

    /**
     * Store a newly created genre in storage.
     *
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:genres',
        ]);

        Genre::create($request->all());

        return redirect()->route('genres.create')->with('success', 'Genre Created Successfully.');
    }
}
