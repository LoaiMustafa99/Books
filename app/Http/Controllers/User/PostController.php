<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function index()
    {
        $data['posts'] = Post::orderBy("id", "desc")->get();
        return view("user.posts.index", $data);
    }


    public function create()
    {
        return view("user.posts.create");
    }


    public function store(Request $request)
    {
        $post = new Post();
        $post->description = $request->description;
        $post->user_id = Auth::guard("reader")->user()->id;
        $post->save();
        if($request->hasFile("photo"))
            $post->saveMedia($request->file("photo"));
//        dd("success");
        return redirect()->route("post.index");
    }



    public function edit(Request $request)
    {
        $data['post'] = Post::find($request->id);
        return view("user.posts.edit", $data);
    }


    public function update(Request $request, $id)
    {
        $post = Post::find($request->id);
        $post->description = $request->description;
        $post->save();

        if($request->hasFile("photo")){
            $post->removeAllFiles();
            $post->saveMedia($request->file("photo"));
        }
        return redirect()->route("post.index");
    }


    public function destroy(Request $request)
    {
        $post = Post::find($request->id);
        $post->removeAllFiles();
        $post->delete();
        return redirect()->route("post.index");
    }
}
