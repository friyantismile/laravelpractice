@extends('layouts.app')

@section('content')
 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard <span class="pull-right"><a href="/listings/create" class="btn btn-success btn-xs">Add Listing</a></span></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Your Listings
                    @if(count($listings))
                        <table class="table">
                            <tr>
                                <th>Company</th>
                                <th><th>
                                <th><th>
                            </tr>
                            @foreach ($listings as $list)
                            <tr>
                                <td>{{$list->name}}</td>
                                <td><a class="btn btn-default" href="listings/{{$list->id}}/edit">Edit</a><td>
                                <td>
                                    
                                        <form action="{!! action('ListingsController@destroy',$list->id) !!}" method="post" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                              </form>    
                                <td>
                            </tr>
                            @endforeach
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
 
@endsection
