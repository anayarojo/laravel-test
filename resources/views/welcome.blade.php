@extends("layouts.app")
@section("title", "Welcome ─ Laravel")
@section("content")
<div class="title m-b-md">
    Raul Anaya
</div>

@if(isset($job_title))
<p>
    {{$job_title}}
</p>
@endif
<br/>

<div class="links">
    @foreach($links as $link => $text)
    <a href="{{$link}}">{{$text}}</a>
    @endforeach
    <!--
    <a href="https://laravel.com/docs">Documentation</a>
    <a href="https://laracasts.com">Laracasts</a>
    <a href="https://laravel-news.com">News</a>
    <a href="https://forge.laravel.com">Forge</a>
    <a href="https://github.com/laravel/laravel">GitHub</a>
    -->
</div>
@endsection