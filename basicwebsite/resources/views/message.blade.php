@extends('layouts.app')

@section("content")
<h1>Messages</h1> 
@if(count($messages))
    @foreach($messages as $msg)
    <ul class='list-group'>
        <li class='list-group-item'>
            Name: {{$msg->name}}<br>
            Email: {{$msg->email}}<br>
            Message: {{$msg->message}}
        </li>
    </ul>

    @endforeach
@endif
@endsection