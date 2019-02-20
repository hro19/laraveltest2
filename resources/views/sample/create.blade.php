<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
        <h3>クリエイト</h3>

            <form action="{{ route('samples.create') }}" method="POST">
              {{ csrf_field() }}
              <div class="form-group">
                <label for="title">タイトル</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}" />
              </div>
              <div class="form-group">
                <label for="title">ぼでぃ</label>
                <input type="text" class="form-control" name="body" id="body" value="{{ old('body') }}" />
              </div>
              <div class="form-group">
                <label for="due_date">ゆーざねーむ</label>
                <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">送信</button>
              </div>
            </form>

{{--     <p>{{ $sample->id }}</p>
    <p>{{ $sample->title }}</p>
    <p>{{ $sample->body }}</p>
    <p>{{ $sample->username }}</p> --}}

    </body>
</html>