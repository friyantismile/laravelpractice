@extends('layouts.app')


@section('content')
<h3>List of Albums</h3>
@if(count($albums) > 0)
    <?php 
    $colcount = count($albums);
    $i=1;
    ?>
    <div class='albums'>
        <div class="row text-center">
        @foreach ($albums as $album)
            <div class="col-md-4">
                <a href="/albums/{{$album->id}}">
                    <img style="width:100%;" src="storage/cover_images/{{$album->cover_image}}" />
                </a>
                <br>
                {{$album->name}}   
            </div>
        @endforeach
        </div>
    </div>
@endif
@endsection