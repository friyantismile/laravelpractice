@extends('layouts.app')


@section("content")
<h1>contact</h1>
{!! Form::open(['url' => 'contact/submit', 'method' => 'POST']) !!}
   <div class="form group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class'=>'form-control'])}}
   </div>
   <div class="form group">
        {{Form::label('email', 'E-mail address')}}
        {{Form::text('email', '',['class'=>'form-control', 'placeholder'=>'Enter email'])}}
   </div>
   <div class="form group">
        {{Form::label('message', 'Message')}}
        {{Form::textarea('message', '',['class'=>'form-control', 'placeholder'=>'Enter message'])}}
   </div>
   <div class=""><br>
        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
   </div>
{!! Form::close() !!}
@endsection