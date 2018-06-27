@extends("layouts.app")

@section("content")
<h1 class="mt-3 mb-3">{{$user->name}}</h1>

<ul>
    @foreach($user->followers as $follower)
        <li>{{$follower->name}}</li>
    @endforeach
</ul>

@endsection