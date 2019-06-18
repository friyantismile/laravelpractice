@extends('layouts.app')

@section('content')
 
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Businesses</div>

                <div class="card-body">
                     
                    @if(count($listings))
                        <table class="table">
                            <tr>
                                <th>Company</th>
                               
                            </tr>
                            @foreach ($listings as $list)
                            <tr>
                                <td><a href="listings/{{$list->id}}">{{$list->name}}</a></td>
                                 
                            </tr>
                            @endforeach
                        </table>
                    @else 
                        No listing found!
                    @endif
                </div>
            </div>
        </div>
    </div>
 
@endsection
