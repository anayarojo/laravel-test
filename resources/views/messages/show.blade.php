@extends("layouts.app")
@section("content")
<h1 class="h3">Mensaje número {{$message->id}}</h1>
<img class="img-thumbnail" src="{{$message->image}}" alt="{{$message->id}}">
<p class="card-text">
{{$message->content}}
<small class="text-muted">
{{$message->created_at}}
</small>
</p>
@endsection