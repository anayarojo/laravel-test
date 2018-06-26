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
    <div class="col-12">
        <form action="/messages/create" method="POST">
            <div class="form-group">
                {{ csrf_field() }}
                <input type="text" name="message" class="form-control @if($errors->has("message")) is-invalid @endif" placeholder="¿Que estas pensando?">
                @if($errors->any())
                    @foreach($errors->get("message") as $error)
                    <div class="invalid-feedback">{{$error}}</div>
                    @endforeach
                @endif
            </div>
        </form>
    </div>
</div>
<div class="row">
    @forelse($messages as $message)
    <div class="col-6">
        <img class="img-thumbnail" src="{{$message->image}}" alt="{{$message->id}}">
        <p class="card-text">{{$message->content}}
        <a href="/messages/{{$message->id}}">Read more</a>
        </p>
    </div>
    @empty
    <div class="col-6">
        <p>No hay mensajes destacados.</p>
    </div>
    @endforelse
</div>
@endsection