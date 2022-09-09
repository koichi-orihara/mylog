@extends('layout')

@section('content')
@if (session('flash_msg'))
<div class="alert alert-success">
    {{ session('flash_msg') }}
</div>
@endif
  <div class="container">
    <div class="row">
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
        <div class="panel panel-default">
          <div class="panel-heading">タスク</div>
            
            <table class="table">
              <thead>
                <tr>
                  <th>タイトル</th>
                  <th>状態</th>
                  <th>期限</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                  <tr>
                    <td>{{ $task->title }}</td>
                    <td>
                      <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
                    </td>
                    <td>{{ $task->formatted_due_date }}</td>
                    <td><a href="{{ route('tasks.restore', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">復元</a></td>
                    <td><a href="{{ route('tasks.physicalDelete', ['id' => $task->folder_id, 'task_id' => $task->id]) }}"><i class="fas fa-trash-alt"></a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      
      <div class="row">
       <div class="column col-md-8">
           {{-- メッセージ作成ページへのリンク --}}
           <button class="btn btn-primary" type="button" onClick="location.href='{{ route('tasks.index', ['id' => Auth::id()]) }}'">戻る</button>
       </div>
      </div>
      
      {{-- <div class="row">
       <div class="column col-md-8">
           {{ $tasks->links() }}
       </div>
      </div> --}}
      
    </div>
    
@endsection