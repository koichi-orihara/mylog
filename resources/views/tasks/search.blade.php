@extends('layout')

@section('content')

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
                    <td><a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">編集</a></td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
@endsection