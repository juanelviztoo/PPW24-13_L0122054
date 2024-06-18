@extends('layouts.app')

@section('content')
<div class="container developer-container">
    <div class="text-center">
        <h1 class="h1-developer">Hi! It's Me!</h1>
        <div class="card card-developer">
            <div class="card-body">
                <img src="storage/elviztoprofile3.jpg" alt="Developer Photo" class="rounded-circle" width="300">
                <h2>Elvizto Juan Khresnanda</h2>
                <p>L0122054</p>
                <p>Informatics, Batch 2022</p>
                <p>Faculty of Information Technology and Data Science</p>
                <p>Sebelas Maret University</p>
                <p>Hii there! let me introduce myself, my name is Elvizto Juan Khresnanda, or called as EL as my friends usually call it.
                I am a person who is very passionate and ambitious in terms of improving myself in whatever conditions and wherever I am.
                Many people call me a Social Butterfly, yeah I think it is truly true, aka I really like socializing with people,
                joking with them, making unforgettable moments with the people, or just meeting and talking about life.</p>
                <p>&copy; {{ date('Y') }} Elviztoo Program</p>
            </div>
        </div>
    </div>
</div>
@endsection
