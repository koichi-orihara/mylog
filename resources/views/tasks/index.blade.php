@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
          <div class="col-md-4">
          </div>
            <div class="col-md-8">
                <h5 class="card-title">検索フォーム</h5>
                <div id="custom-search-input">
                    <div class="input-group col-md-12">
                        <form action="{{ route('tasks.search') }}" method="get">

                            <input type="text" class="form-control input-lg" placeholder="タスク名" name="search" value="">
                            <span class="input-group-btn" style="position: relative;top: -36px;right: -700px;">
                                <button class="btn btn-info" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <div class="container">
    <div class="row">
      <div class="col col-md-4">
        <nav class="panel panel-default">
          <div class="panel-heading">フォルダ</div>
            <div class="panel-body">
              <a href="{{ route('folders.create') }}" class="btn btn-default btn-block">
                フォルダを追加する
              </a>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>@sortablelink('title', 'タイトル')</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($folders as $folder)
                  <tr>
                    <td>
                      <a href="{{ route('tasks.index', ['id' => $folder->id]) }}"
                      class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
                      >
                        {{ $folder->title }}
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
            {{-- <div class="list-group">
              @foreach ($folders as $folder)
                <a href="{{ route('tasks.index', ['id' => $folder->id]) }}"
                class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
                >
                  {{ $folder->title }}
                </a>
                 {{ Form::open(['method'=>'delete','route'=>['folders.destroy',$folder->id]]) }}
                    @csrf
                    {{ Form::submit('削除',['class'=>'btn btn-outline-danger']) }}
                  {{ Form::close() }}
              @endforeach
            </div> --}}
        </nav>
      </div>
      <div class="column col-md-8">
        <!-- ここにタスクが表示される -->
        <div class="panel panel-default">
          <div class="panel-heading">タスク</div>
            <div class="panel-body">
              <div class="text-right">
                <a href="{{ route('tasks.create', ['id' => $current_folder_id]) }}" class="btn btn-default btn-block">
                  タスクを追加する
                </a>
              </div>
            </div>
            <table class="table">
              <thead>
                <tr>
                  <th>@sortablelink('title', 'タイトル')</th>
                  <th>@sortablelink('status', '状態')</th>
                  <th>@sortablelink('due_date', '期限')</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($tasks as $task)
                  <tr>
                    {{-- <td>{!! link_to_route('tasks.show', {{ $task->title }}, ['id' => $task->folder_id, 'task_id' => $task->id], ['class' => 'btn btn-primary']) !!}</td> --}}
                    <td><a href="{{ route('tasks.show', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">{{ $task->title }}</a></td> 
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