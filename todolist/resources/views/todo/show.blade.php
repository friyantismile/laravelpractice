@extends('layouts.app')

@section('content')
    <a href="/" class="btn btn-default">Go back</a>
            <h3><a href="todo/{{$todo->id}}">{{$todo->text}}</a></h3>   
            <span class="label label-danger">{{$todo->due}}</span>  
            <hr>
            <p>{{$todo->body}}</p> 

            <br><br>
            <a class="btn btn-primary" href="/todo/{{$todo->id}}/edit">Edit</a>
            {!! Form::open(['action' => ['TodoController@destroy', $todo->id], 'method' => 'POST', 'class'=> 'pull-right']) !!}
                {{ Form::hidden('_method', 'DELETE')}}
                {{Form::bsSubmit('Delete', ['class'=>'btn btn-danger'])}}
            {!! Form::close() !!}
@endsection