@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{$listing->name}}</div>

                <div class="card-body">
                           

                                   
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
        
                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email" value="{{$listing->email}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                        <label for="phone" class="col-md-4 col-form-label text-md-right">Phone</label>
            
                                        <div class="col-md-6">
                                            <input id="phone" type="text" class="form-control" name="phone" value="{{$listing->phone}}">
                                        </div>
                                    </div>
                                 <div class="form-group row">
                                        <label for="website" class="col-md-4 col-form-label text-md-right">Website</label>
            
                                        <div class="col-md-6">
                                            <input id="website" type="text" class="form-control" name="website" value="{{$listing->website}}">
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="address" class="col-md-4 col-form-label text-md-right">address</label>
            
                                        <div class="col-md-6">
                                            <input id="address" type="text" class="form-control" name="address" value="{{$listing->address}}" >
                                        </div>
                                    </div>

                                <div class="form-group row">
                                        <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>
            
                                        <div class="col-md-6">
                                            <input id="bio" type="text" class="form-control" name="bio" value="{{$listing->bio}}" >
                                        </div>
                                    </div>
         
          
        
                                
                       
                </div>
            </div>
        </div>
    </div>
 
 
@endsection