<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateReplyRequest;
use App\Http\Requests\CreatePostRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\Post;
use App\Models\Reply;

class ForumController extends Controller
{

    function viewPost ($slug) {
        try {
            $post = Post::where('slug','=',$slug)->first();
            return view('pages.reply',compact('post'));
        }
        catch(ModelNotFoundException $ex) {
            return redirect('/');
        }
        return view('pages.reply');
    }

    function newPost (Request $request) {
        $post = new Post;

        $validated = $request->validate([
            'posttitle' => 'required',
            'postbody' => 'required',
        ]);

        $post->posttitle=$request->posttitle;
        $post->postbody=$request->postbody;
        $post->save();
        return redirect('/');
    }

    function deletePost (Request $request) {
        $post = Post::where('id',"=", $request['post_id']);
        if($post) {
            $post->delete();
            return redirect()->back();
        }
        else { return redirect('/'); }
    }

    public function saveReply (CreateReplyRequest $request) {
        $post = Post::where('slug', "=", $request['slug'])->first();

        if($post) {
            $reply = new Reply;
            $reply->post_id = $post->id;
            $reply->replybody = $request['replybody'];
            $reply->save();
            return redirect()->back();
        }
        else { return redirect('/'); }
    }

    public function deleteReply (Request $request) {
        $reply = Reply::where('id',"=", $request['reply_id']);
        if($reply) {
            $reply->delete();
            return redirect()->back();
        }
        else {return redirect('/');}
    }

    public function getEditPost ($id) {
        $post = Post::findOrFail($id);
        if ($post) {
            return view('pages.editpost',compact('post'));
        }
    }
    
    public function saveEditPost (CreatePostRequest $request) {
        try {
            $post = Post::findOrFail($request['post_id']);
            if ($post) {
                $post->posttitle=$request->posttitle;
                $post->postbody=$request->postbody;
                $post->save();
                return redirect()->back();
            }
        }
        catch(ModelNotFoundException $ex) {
            return redirect('/');
        }
    }


}