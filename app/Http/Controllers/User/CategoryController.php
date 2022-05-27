<?php

namespace App\Http\Controllers\User;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookFavorite;
use App\Models\Category;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(){
        $data['books'] = Book::all();
        $data['categories'] = Category::where("status", 1)->get();
        return view("user.category.index", $data);
    }

    public function show(Request $request){
        $data['book'] = $book = Book::find($request->id);
        if(Auth::guard("reader")->check())
            $data['favorite'] = BookFavorite::where("book_id", $request->id)->where("user_id", Auth::guard("reader")->user()->id)->first();
        if(Auth::guard("reader")->check())
            $data['rating'] = Rating::where("book_id", $request->id)->where("user_id", Auth::guard("reader")->user()->id)->first();

        return view("user.books.show", $data);
    }

    public function rating(Request $request){
        $book = Rating::where("book_id", $request->book_id)->where("user_id", Auth::guard("reader")->user()->id)->first();
        if(!$book)
            $book = new Rating();
        $book->book_id = $request->book_id;
        $book->user_id = Auth::guard("reader")->user()->id;
        $book->number_rating = $request->number_rating;
        $book->save();
        return JsonResponse::success()->send();
    }
}
