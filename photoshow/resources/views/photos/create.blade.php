@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Listing</div>

                <div class="card-body">
                            <form method="POST" action=" {!! action('PhotosController@store') !!} " enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Title</label>
        
                                    <div class="col-md-6">
                                        <input id="id" type="hidden" class="form-control" name="id" value="{{$album_id}}" autocomplete="name" autofocus>
                                    
                                        <input id="title" type="text" class="form-control" name="title" value="" autocomplete="name" autofocus>
                                    </div>
                                </div>
                                 

                                <div class="form-group row">
                                        <label for="bio" class="col-md-4 col-form-label text-md-right">Description</label>
            
                                        <div class="col-md-6">
                                            <input id="description" type="text" class="form-control" name="description" value="" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="bio" class="col-md-4 col-form-label text-md-right">Cover Image</label>
            
                                        <div class="col-md-6">
                                            <input id="photo" type="file" class="form-control" name="photo" value="" >
                                        </div>
                                    </div>
         
          
        
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Create
                                        </button>
                                    </div>
                                </div>
                            </form>
                </div>
            </div>
        </div>
    </div>
 
 
@endsection