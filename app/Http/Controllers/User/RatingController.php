<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function index(){
        $data['books'] = Book::join("rating", "rating.book_id", "=","book.id")->orderBy("rating.number_rating", "desc")->get("book.*");
//        dd($data);
        return view("user.ratings.index", $data);
    }
}
