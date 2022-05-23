<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index(){
        $data['books'] = Book::all();
        return view("user.books.index", $data);
    }
}
