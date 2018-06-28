@extends("layouts.app")

@section("content")
<h1 class="mt-3 mb-3">{{$user->name}}</h1>
<a class="btn btn-link" href="/users/{{$user->username}}/follows">
    Sigue a <span class="badge badge-default">{{$user->follows->count()}}</span>
</a>
<a class="btn btn-link" href="/users/{{$user->username}}/followers">
    Seguidores <span class="badge badge-default">{{$user->followers->count()}}</span>
</a>
@if(Auth::check())
    @if(Gate::allows("dms", $user))
    <form action="/users/{{$user->username}}/dms" method="POST">
        @csrf
        <input type="text" type="text" name="message" class="form-control">
        <button class="btn btn-success">Send</button>
    </form>
    @endif
    @if(Auth::user()->isFollowing($user))
        <form action="/users/{{$user->username}}/unfollow" method="POST">
            {{csrf_field()}}
            @if(session("success"))
                <span class="text-success">{{session("success")}}</span>
            @endif
            <button class="btn btn-danger">Unfollow</button>
        </form>
    @else
        <form action="/users/{{$user->username}}/follow" method="POST">
            {{csrf_field()}}
            @if(session("success"))
                <span class="text-success">{{session("success")}}</span>
            @endif
            <button class="btn btn-primary">Follow</button>
        </form>
    @endif
@endif
<div class="row">
    @foreach($user->messages as $message)
        <div class="col-6">
            @include("messages.message")
        </div>
    @endforeach
</div>
@endsection