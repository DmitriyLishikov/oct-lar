@extends('layouts.app')
@section('content')
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form action="{{ route('news_store') }}" method="POST" class="form-horizontal">
        {{ csrf_field() }}
        <!-- Имя задачи -->
        <div class="form-group">
            <label for="task" class="col-sm-3 control-label">Название</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
            <label for="task" class="col-sm-3 control-label">Текст</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control">
            </div>
        </div>
        <!-- Кнопка добавления задачи -->
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" class="btn btn-default bg-success">
                    <i class="fa fa-plus"></i> Добавить новость
                </button>
            </div>
        </div>
    </form>
</div>
<h3>News</h3>
<table class="table table-striped task-table">
    @foreach ($news as $key)
    <tr>
        <td>
            <div class="panel-body">
                <form action="{{ route('news_show',$news->id)}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-default bg-succes" value="h" name="agsa" >
                            <h2>{{$news->name}}</h2>
                        </button>
                    </div>
                </form>
            </div>        
        </td>
        <td>
            <form method='post' action="{{ route('news_destroy',$news->id)}}">
                {{ csrf_field() }}
                {{method_field('delete')}}                                     
                <button type="submit" class="btn btn-default bg-danger">
                    <i class="fa fa-trash"></i> Удалить
                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection