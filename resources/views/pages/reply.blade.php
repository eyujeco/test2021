@extends('layouts.masters.main')
@section('page-content')
@include('layouts.partials.nav')


    <div class="container my-5">
        <div class="jumbotron">
            <div class="container">
            <h3>{{$post->posttitle}}</h3>
            <p>{{$post->postbody}}</p>
            <p>{{$post->created_at->diffForHumans()}}</p>
            </div>
        </div>
    </div>

    @foreach ($post->replies as $reply)
        <div class="container px-5">
            <div class="jumbotron">
                <p>{{$reply->replybody}}</p>
                <form method="POST" action="{{ route('delete_reply') }}" id="delete-reply-form">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" value="{{$reply->id}}" name="reply_id">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    @endforeach

    <div class="container">

        <form method="POST" action="{{ route('save_reply') }}">
            @csrf
            <div class="form-group">
                <label>Post a reply</label>
                <textarea name="replybody" class="form-control" rows="2" required></textarea>
                <input type="hidden" value="{{$post->slug}}" name="slug">
            </div>
            <button type="submit" class="btn btn-primary">Reply</button>
        </form>
    </div>






  
@stop