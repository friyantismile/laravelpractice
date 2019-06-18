@extends('layouts.app')

@section('content')
    <a href="/todo/{{$todo->id}}">Go back to</a>
    <h1>Edit Post</h1>
    {!! Form::open(['action' => ['TodoController@update', $todo->id], 'method' => 'POST']) !!}
        {{ Form::hidden('_method', 'PUT')}}
        {{ Form::bsText('text', $todo->text)}}
        {{ Form::bsTextArea('body', $todo->body)}}
        {{ Form::bsText('due', $todo->due)}}
        {{Form::bsSubmit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection