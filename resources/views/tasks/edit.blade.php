@extends('layouts.app')
@section('content')
<!-- Bootstrap шаблон... -->
<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')
    <!-- Форма новой задачи -->
    <form method='post' action="{{ route('tasks_update', $task->id) }}">
        {{ csrf_field() }}
        {{method_field('put')}}                                     
        <div class="form-group">
            <label for="task" class="col-sm-3 control_label">Задача</label>
            <div class="col-sm-6">
                <input type="text" name="name" id="task-name" class="form-control" value="{{$task->name}}" >
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-6">
                <button type="submit" clas="btn btn-default bg-succes">
                    <i class="fa fa-plus"></i>Сохранить задачу
                </button>
            </div>
    </form>
</div>
@endsection