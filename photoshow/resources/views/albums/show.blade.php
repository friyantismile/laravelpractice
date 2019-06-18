@extends('layouts.app')


@section('content')
<h3>{{$album->name}}</h3>
<a class="btn btn-default" href="/photos/create/{{$album->id}}">Upload photo to album</a>
<hr>
@if(count($album->photos) > 0)
    <?php 
    $colcount = count($album->photos);
    $i=1;
    ?>
    <div class='albums'>
        <div class="row text-center">
        @foreach ($album->photos as $photo)
            <div class="col-md-4">
                <a href="/photos/{{$photo->id}}">
                    <img style="width:100%;" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" />
                </a> 
            </div>
        @endforeach
        </div>
    </div>
@endif
@endsection