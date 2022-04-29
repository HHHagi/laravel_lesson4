@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <p>タイトル</p>
    @error('title')
    <div>{{$message}}</div>
    @enderror
    <textarea name="title" style="width:100%;"></textarea>
    <p>メッセージ</p>
    @error('message')
    <div>{{$message}}</div>
    @enderror
    <textarea type="text" name="message" style="width:100%; height: 300px;"></textarea>
    <button type="submit" class="btn btn--blue">追加</button>
</form>

@endsection