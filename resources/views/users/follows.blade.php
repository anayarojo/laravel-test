@extends("layouts.app")

@section("content")
<h1 class="mt-3 mb-3">{{$user->name}}</h1>

<ul>
    @foreach($user->follows as $follow)
        <li>{{$follow->name}}</li>
    @endforeach
</ul>

@endsection