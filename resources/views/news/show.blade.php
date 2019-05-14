@extends('layouts.app')
@section('content')
<form method='post' action="{{ route('news_index') }}">
    {{ csrf_field() }}
    {{method_field('get')}}   
    <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" class="btn btn-default bg-succes" value="h" name="agsa" >
            <h2>{{$news->name}} </h2>
        </button>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <p>{{$news->text}}</p>
    </div>
    <div class="col-sm-offset-3 col-sm-6">
        <button type="submit" clas="btn btn-default bg-succes">К новостям</button>
    </div>
</form>        
@endsection