@extends('layout')

@section('content')
@include('commons.error_messages')
@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        プロフィール
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('upload')}}" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image">
            <button class="btn btn-success">アップロード</button>
        </form>
    </div>
</div>
{{-- プロフィール詳細画面ページへのリンク --}}
<button class="btn btn-primary" type="button" onClick="location.href='{{ route('users.index', ['id' => Auth::id()]) }}'">戻る</button>

@endsection