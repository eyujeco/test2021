@extends('layouts.masters.main')
@section('page-content')
@include('layouts.partials.nav')

<div class="container">
  
  @if ($errors->any())
      <div class="alert alert-danger">
          Please fill in all fields
      </div>
  @endif

  <form method="POST" action="newpost">
    @csrf
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" name="posttitle" class="form-control" id="exampleInputEmail1" placeholder="Title of post">
        <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Post body</label>
        <textarea name="postbody" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>


</div>



@stop