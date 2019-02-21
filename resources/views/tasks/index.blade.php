@extends('layout')

@section('content')
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
        <div class="list-group">
          @foreach($folders as $folder)
          <a
          href="{{ route('tasks.index', ['id' => $folder->id]) }}"
          class="list-group-item {{ $current_folder_id === $folder->id ? 'active' : '' }}"
          >
          {{ $folder->title }}
        </a>
          <a href="{{ route('folders.destroy', ['id' => $folder->id]) }}">フォルダ削除</a>

        @endforeach
      </div>
    </nav>
  </div>
  <div class="column col-md-8">
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
            <th>タイトル</th>
            <th>状態</th>
            <th>期限</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          @foreach($tasks as $task)
          <tr>
            <td>
              <p>{{ $task->title }}</p>
{{-- {{dump($task->categories()->get())}} --}}
              <p>
                @foreach($task->categories()->get() as $category)
                <i style="color:#00f";>{{ $category->name }}</i>
                @endforeach
              </p>
            </td>
            <td>
              <span class="label {{ $task->status_class }}">{{ $task->status_label }}</span>
            </td>
            <td>{{ $task->due_date_ymd }}({{ $task->due_date_yobi }})</td>
            <td>
              <a href="{{ route('tasks.edit', ['id' => $task->folder_id, 'task_id' => $task->id]) }}">
                編集
              </a>
              <a href="{{ route('tasks.delete',  ['id' => $task->folder_id, 'task_id' => $task->id]) }}">タスク削除</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>


      
    </div>
  </div>
</div>
</div>
@endsection