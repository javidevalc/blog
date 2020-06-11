@extends('layouts.app')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Post</a></h2>
<br>
 
<form action="{{ route('posts.store') }}" method="POST" name="add_post">
{{ csrf_field() }}
 
<div class="row" style="padding-left:200px;padding-right:200px;padding-top:20px;">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Title</strong>
            <input type="text" name="title" class="form-control" placeholder="Enter Title">
            <span class="text-danger">{{ $errors->first('title') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Description</strong>
            <textarea class="form-control" col="4" name="description" placeholder="Enter Description"></textarea>
            <span class="text-danger">{{ $errors->first('description') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection