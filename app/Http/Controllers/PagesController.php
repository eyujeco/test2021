<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function home() {
        $posts = Post::orderBy('created_at','desc')->paginate(5);
        return view('pages.home',['posts'=>$posts]);
    }


}
