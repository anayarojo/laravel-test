@extends("layouts.app")
@section("title", "Welcome ─ Laravel")
@section("content")
<div class="mt-5 jumbotron text-center">
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
        <form action="/messages/create" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="message" class="form-control @if($errors->has("message")) is-invalid @endif" placeholder="¿Que estas pensando?">
                @if($errors->any())
                    @foreach($errors->get("message") as $error)
                    <div class="invalid-feedback">{{$error}}</div>
                    @endforeach
                @endif
                <input type="file" class="form-control-file" name="image">
            </div>
        </form>
    </div>
</div>
<div class="row">
    @forelse($messages as $message)
    <div class="col-6">
        @include("messages.message")
    </div>
    @empty
    <div class="col-6">
        <p>No hay mensajes destacados.</p>
    </div>
    @endforelse
    @if(count($messages))
    <div class="mt-3 mx-auto">
        {{$messages->links()}}
    </div>
    @endif
</div>
@endsection