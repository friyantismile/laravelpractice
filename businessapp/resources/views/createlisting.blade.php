@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Listing</div>

                <div class="card-body">
                            <form method="POST" action=" {!! action('ListingsController@store') !!} ">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
        
                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="name" value="" autocomplete="name" autofocus>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
            
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="phone" value="">
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
            
                                        <div class="col-md-6">
                                            <input id="website" type="text" class="form-control" name="website" value="">
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right">address</label>
            
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control" name="address" value="" >
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
            
                                        <div class="col-md-6">
                                            <input id="bio" type="text" class="form-control" name="bio" value="" >
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