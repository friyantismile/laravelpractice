@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @include('inc.message')
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal">
                        Add Bookmark
                    </button>
                    <hr>
                    <h3>My bookmarks</h3>
                    <ul class="list-group">
                        @foreach ($bookmarks as $bm)
                            <li>
                                <a href="{{$bm->url}}" target="_blank" style="">{{$bm->name}} <span class="label label-default">{{$bm->description}}</span> </a>
                                <span class="pull-right button-group">
                                    <button class="btn btn-danger delete-bookmark" data-id="{{$bm->id}}">
                                        <span class="glyphicon glyphicon-remove"></span>
                                        Delete
                                    </button>
                                </span>
                            </li>   
                        @endforeach 
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Bookmark</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="{{ route('bookmarks.store') }}" method="post">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Bookmark name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="">Bookmark URL</label>
                    <input type="text" class="form-control" name="url">
                </div>
                <div class="form-group">
                    <label for="">Bookmark description</label>
                    <textarea class="form-control" name="description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
