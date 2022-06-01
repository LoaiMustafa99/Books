<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class RequestBookController extends Controller
{
    public function index(){
        $data['books'] = Book::where("approved", 0)->get();
        return view("admin.request_book.index", $data);
    }

    public function action(Request $request){
        $book = Book::find($request->id);
        $book->approved = 1;
        $book->save();
        return redirect()->route("admin.request-books.index");
    }
}
