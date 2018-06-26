<img class="img-thumbnail" src="{{$message->image}}" alt="{{$message->id}}">
<p class="card-text">{{$message->content}}
    <div class="text-muted">
        Escrito por 
        <a href="/users/{{$message->user->username}}">{{$message->user->name}}</a> 
        el {{date("d/m/Y", strtotime($message->created_at))}}
    </div>
    <a href="/messages/{{$message->id}}">Read more</a>
</p>