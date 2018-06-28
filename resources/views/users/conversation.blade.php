@extends("layouts.app")

@section("content")

<h1>Conversation with {{ $conversation->users->except($user->id)->implode("name", ",") }}</h1>

<div class="card">
    @foreach($conversation->privateMessages as $message)
    <div class="card">
        <div class="card-header">
            <p>{{ $message->user->name }} dijo...</p>
        </div>
        <div class="card-block">
            <p>{{ $message->message }}</p>
        </div>
        <div class="card-footer">
            <p>{{ $message->created_at }}</p>
        </div>
    </div>
    @endforeach
</div>

@endsection