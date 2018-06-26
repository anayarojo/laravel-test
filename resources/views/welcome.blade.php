@extends("layouts.app")
@section("title", "Welcome ─ Laravel")
@section("content")
<div class="jumbotron text-center">
    <h1>Raul Anaya</h1>
    <nav>
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/about">About</a>
            </li>
        </ul>
    </nav>
</div>
<div class="row">
    @foreach($messages as $message)
    <div class="col-6">
        <img class="img-thumbnail" src="{{$message["image"]}}" alt="{{$message["id"]}}">
        <p class="card-text">{{$message["content"]}}
        <a href="/messages/{{$message["id"]}}">Read more</a>
        </p>
    </div>
    @endforeach
</div>
@endsection