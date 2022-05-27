<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\BookComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookCommentController extends Controller
{
    public function store(Request $request){
        $comment  = new BookComment();
        $comment->text = $request->comment_body;
        $comment->user_id = Auth::guard("reader")->user()->id;
        $comment->book_id = $request->book_id;
        $comment->save();
        return redirect()->route("category.show", ["id" => $request->book_id]);
    }

    public function destroy(Request $request){
        BookComment::find($request->id)->delete();
        return redirect()->route("category.show", ["id" => $request->book_id]);
    }
}
