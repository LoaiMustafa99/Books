<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data['books'] = Book::where("id", $request->book_id)->get();
        return view("post", $data);
    }


    public function contact(){

        $people = ["Loai", "ahmad", "edwin", "Mustafa"];
        return view('contact', compact("people"));
    }

    public function show_view($id, $name, $password){
        // $array = ["id" => 12, "name" => "Loai"];
        return view('post', compact("id", "name", "password"));
    }

    public function destroy(Request $request){
        $user = User::where("id", $request->id)->first();
        $user->delet();
    }
}
