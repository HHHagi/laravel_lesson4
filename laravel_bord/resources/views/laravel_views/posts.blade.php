@extends('layouts.app')

@section('content')
@foreach($posts as $post )
<article>
    <h3>{{$post->title}}</h3>
    <p>{{$post->message}}</p>
    <p>投稿者：{{$post->user->name}}</p>
    @if($post->user_id === Auth::user()->id )
    <a href="{{ url('posts/'.$post->id.'/edit') }}" class="btn btn--blue">編集</a>
    <form style="display: inline-block;" method="post" action="{{ route('posts.destroy', $post->id) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn--orange">削除する</button>
    </form>
    @endif
    <div>
        @if($post->is_liked_by_auth_user())
        <a href="{{ route('post.unlike', ['id' => $post->id]) }}">
            <i class="fas fa-heart"></i>
        </a>
        <span>{{ $post->likes->count() }}</span>
        @else
        <a href="{{ route('post.like', ['id' => $post->id]) }}">
            <i class="far fa-heart"></i>
        </a>
        <span>{{ $post->likes->count() }}</span>
        @endif
    </div>
</article>
@endforeach

@endsection