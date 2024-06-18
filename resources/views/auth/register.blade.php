@extends('layouts.app')

@section('content')
<div class="container mt-2 container-form">
    <h1>Registration Form</h1>
    @if (session('success'))
        <div class="alert alert-success fade show" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Enter your name..." value="{{ old('name') }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Enter your email..." value="{{ old('email') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <div class="input-group">
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Enter your password..." required>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-eye toggle-password" style="cursor: pointer;"></i></span>
                </div>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <div class="input-group">
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password..." required>
                <div class="input-group-append">
                    <span class="input-group-text"><i class="fa fa-eye toggle-password" style="cursor: pointer;"></i></span>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Register</button>
        <p class="mt-3">Already Have an Account? <a href="{{ route('login') }}">Login Now!</a></p>
    </form>
</div>
<script>
    document.querySelectorAll('.toggle-password').forEach(item => {
        item.addEventListener('click', event => {
            let input = event.target.closest('.input-group').querySelector('input');
            if (input.type === 'password') {
                input.type = 'text';
                event.target.classList.replace('fa-eye', 'fa-eye-slash');
            } else {
                input.type = 'password';
                event.target.classList.replace('fa-eye-slash', 'fa-eye');
            }
        });
    });
</script>
@endsection