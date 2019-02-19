@extends('layout')


@section('content')
  <div class="container">
    <div class="row">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="panel panel-default">
          <h2 class="panel-heading">タスクの詳細を見る</h2>
          <div class="panel-body">

              <p>{{$task->title}}<p>
              <p>{{ \App\Task::STATUS[$task->status]["label"] }}<p>
              <p>{{$task->due_date}}<p>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection
