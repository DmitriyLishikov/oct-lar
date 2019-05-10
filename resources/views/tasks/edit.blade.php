@extends('layouts.app')
@section('content')
<form method='get' action="{{ url('tasks/'.$task->id) }}">
    {{ csrf_field() }}
    {{method_field('put')}}                                     
    <button type="submit" class="btn btn-default bg-danger">
        <i class="fa fa-edit"></i> Изменить
    </button>
</form>
@endsection