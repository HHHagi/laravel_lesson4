@extends('layouts.app')

@section('content')
<p>aaaaa</p>

<form method="post" action="{{ route('posts.store') }}">
    @csrf
    <p>タイトル</p>
    <textarea name="title" style="width:100%;"></textarea>
    <p>メッセージ</p>
    <textarea type="text" name="message" style="width:100%; height: 300px;"></textarea>
    <button type="submit" class="btn btn--blue">追加</button>
</form>

@endsection