<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookFavorite;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BooksController extends Controller
{
    public function index(){
        if(!Auth::guard("reader")->check())
            return redirect()->route("user.login");
        $data['books'] = BookFavorite::Where("user_id", Auth::guard("reader")->user()->id)->get();
        return view("user.books.index", $data);
    }
}
