@extends('layouts.masters.main')
@section('page-content')
@include('layouts.partials.nav')

  <div class="container my-3">
    <center>
      <h1>MAIN PAGE</h1>
      <a href="/newpost"><button type="button" class="btn btn-primary">Add thread</button></a>  
    </center>
  </div>

  <div class="container px-5">
  <table class="table table-striped table-dark table-bordered">
    <tbody>
      @foreach ($posts as $post)
          <tr>
            <!-- <td>{{$post['id']}}</td> -->
            <td>
              <a href="http://localhost:8000/postdetail/{{$post->slug}}">{{$post['posttitle']}}</a>
              <!-- <p>{{$post['postbody']}}</p> -->
            </td>
            <td>
              <form method="POST" action="{{ route('delete_post') }}" id="delete-post-form">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{$post->id}}" name="post_id">
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
            <td>
              <form method="GET" action="{{ route('get_edit_post', $post->id) }}">
                @csrf
                <input type="hidden" value="{{$post->id}}" name="post_id">
                <button type="submit" class="btn btn-success">Update</button>
              </form>
            </td>
          </tr>
      @endforeach   
    </tbody>
  </table>

  <div class="d-flex">
    {!! $posts->links() !!}
  </div>

  </div>

  


@stop