@extends('layouts.app')
@section('content')
<h3>{{$photo->title}}</h3>
<p>{{$photo->description}}</p>
<hr>
<img style="width:100%;" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" />
<form method="POST" action=" {!! action('PhotosController@destroy', $photo->id) !!} ">
    {{ csrf_field() }}
    @method('DELETE') 
    <input id="id" type="hidden" class="form-control" name="id" value="{{$photo->id}}">
        
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-dannger">
                Delete
            </button>
        </div>
    </div>
</form>
<small>{{$photo->size}}</small>
@endsection