@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('posts.update', $post->id) }}">
    @csrf
    @method('PUT')
    <p>タイトル</p>
    @error('title')
    <div>{{$message}}</div>
    @enderror
    <input style="width: 100%;" type="text" name="title" value="{{ old('title') ?: $post->title }}">
    <p>メッセージ</p>
    @error('message')
    <div>{{$message}}</div>
    @enderror
    <textarea style="width: 100%; height: 300px;" name="message">{{ old('message') ?: $post->message }}</textarea><br>
    <button type="submit" class="btn btn--blue">編集完了</button>
</form>

@endsection