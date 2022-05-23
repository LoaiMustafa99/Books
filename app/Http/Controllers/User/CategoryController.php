<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data['books'] = Book::all();
        $data['categories'] = Category::where("status", 1)->get();
        return view("user.category.index", $data);
    }
}
