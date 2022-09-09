@extends('layout')

@section('content')
 
<div class="card">
    <div class="card-header">
        プロフィール
    </div>
    <div class="card-body">
        <figure>
        <img src="{{ asset($image->path) }}" width="100px" height="100px">
        <figcaption>現在のプロフィール画像</figcaption>
        </figure> 
    </div>
</div>
<a href="{{ route('users.edit', ['id' => Auth::id()]) }}">編集</a>

<button class="btn btn-primary" type="button" onClick="location.href='{{ route('tasks.index', ['id' => Auth::id()]) }}'">戻る</button>
@endsection