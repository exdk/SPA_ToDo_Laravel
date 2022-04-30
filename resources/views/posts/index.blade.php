@extends('layout.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br><h2>Laravel 8 ToDo </h2><br>
            </div>
            <div class="pull-right">
                <br><a class="btn btn-success" href="{{ route('posts.create') }}"> Создать новую запись</a><br>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>Название</th>
            <th>Описание</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->description }}</td>
            <td>
                 <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Просмотр</a>
                    <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Изменить</a>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
   
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Удалить</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

@endsection