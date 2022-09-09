@extends('layout')

@section('styles')
  @include('share.flatpickr.styles')
@endsection

@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <div class="panel-heading">タスクの詳細</div>
          <div class="panel-body">
            
              <div class="form-group">
                <label for="title">タイトル</label>
                <div>{{ $task->title }}</div>
              </div>
              <div class="form-group">
                <label for="title">状態</label>
                <div>{{ $task->status }}</div>
              </div>
              <div class="form-group">
                <label for="title">期限</label>
                <div>{{ $task->due_date }}</div>
              </div>
              
              <div class="text-right">
                <button class="btn btn-primary" type="button" onClick="history.back()">戻る</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
 @include('share.flatpickr.scripts')
@endsection