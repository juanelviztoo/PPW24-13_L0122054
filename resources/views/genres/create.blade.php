@extends('layouts.app')

@section('content')
<div class="container mt-2 container-form">
    <h1>Add Genres</h1>
    @if (session('success'))
    <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('genres.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Genre Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter the Name of the Genre..." required autofocus>
        </div>
        <button type="submit" class="btn btn-primary">Add Genre</button>
    </form>
</div>
@endsection
