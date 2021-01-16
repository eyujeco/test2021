@extends('layouts.masters.main')
@section('page-content')
@include('layouts.partials.nav')

<div class="container">

  <form action="{{ route('edit_post', $post->id) }}" method="POST" id="edit-post-form">
    @csrf
    <div class="form-group">
        <input type="hidden" value="{{$post->id}}" name="post_id">
        <label for="exampleInputEmail1">Edit post title</label>
        <input type="text" name="posttitle" class="form-control" value="{{$post->posttitle}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Edit post body</label>
        <textarea name="postbody" class="form-control" rows="3">{{$post->postbody}}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>

</div>

@stop