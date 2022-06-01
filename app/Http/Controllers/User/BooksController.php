<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookFavorite;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BooksController extends Controller
{

    public function rules(){
        return [
            "name"          => ["required", "min:10", "max:255"],
            "age_from"           => ["required", "min:5", "numeric", "lt:age_to"],
            "age_to"           => ["required", "min:10", "numeric", "gt:age_from"],
            "description"   => ["required"],
            "publishing_year"     => ['required'],
            "book_photo" => ["required","image"]
        ];
    }

    public function index(){
        if(!Auth::guard("reader")->check())
            return redirect()->route("user.login");
        $data['books'] = BookFavorite::Where("user_id", Auth::guard("reader")->user()->id)->get();
        return view("user.books.index", $data);
    }

    public function create(){
        $data['categories'] = Category::where("status", 1)->get();
        return view("user.books.create", $data);
    }

    public function myBook(){
        $data['books'] = Book::where("user_id", Auth::guard("reader")->user()->id)->get();
        return view("user.books.my_book", $data);
    }


    public function store(Request $request){
        $valid = Validator::make($request->all(), $this->rules());
        if($valid->fails())
            return redirect()->route("books.create")->withInput($request->all())->withErrors($valid->errors()->messages());

        $book = new book();
        $book->name = $request->name;
        $book->age_from = $request->age_from;
        $book->age_to = $request->age_to;
        $book->user_id = Auth::guard("reader")->user()->id;
        $book->approved = 0;
        $book->category_id = $request->category_id;
        $book->description = $request->description;
        $book->publishing_year = $request->publishing_year;
        $book->save();
        $book->saveMedia($request->file("book_photo"));
        return redirect()->route("books.index");
    }

    public function edit(Request $request)
    {
        $data["book"] = Book::findOrFail($request->id);
        $data['categories'] = Category::where("status", 1)->get();
        return view("user.books.edit", $data);
    }

    public function update(Request $request, $id)
    {
        $rules = $this->rules();
        if(!$request->hasFile("book_photo"))
            $rules['book_photo'] = [];
        $valid = Validator::make($request->all(), $rules);
        if($valid->fails())
            return redirect()->route("books.edit", ["id" => $request->id])->withInput($request->all())->withErrors($valid->errors()->messages());

        $book = book::find($request->id);
        $book->name = $request->name;
        $book->age_from = $request->age_from;
        $book->age_to = $request->age_to;
        $book->approved = 0;
        $book->description = $request->description;
        $book->publishing_year = $request->publishing_year;
        $book->save();
        if($request->hasFile("book_photo")){
            $book->removeAllFiles();
            $book->saveMedia($request->file("book_photo"));
        }
        return redirect()->route("books.index");
    }

    public function destroy(Request $request)
    {
        $book = Book::find($request->id);
        $book->removeAllFiles();
        $book->delete();
        return redirect()->route("books.index");
    }
}
