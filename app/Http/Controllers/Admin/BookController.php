<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{

    public function rules(){
        return [
            "name"          => ["required", "min:10", "max:255"],
            "age_from"           => ["required", "min:5", "numeric"],
            "age_to"           => ["required", "min:10", "numeric"],
            "user_id"       => ["required"],
            "sub_category"   => ["required"],
            "description"   => ["required"],
            "made_year"     => ['required']
        ];
    }

    public function index()
    {
        $data['books'] = Book::all();
        return view("admin.books.index",$data);
    }

    public function create()
    {
        $data['users']=User::all();
        $data['categories']=Category::all();
        return view("admin.books.create",$data);

    }


    public function store(Request $request){
        $valid = Validator::make($request->all(), $this->rules());
        if($valid->fails())
            return redirect()->route("admin.books.create")->withInput($request->all())->withErrors($valid->errors()->messages());

        $book =new book ;
        $book->is_admin = 1;
        $book->name = $request->name;
        $book->age_from = $request->age_from;
        $book->age_to = $request->age_to;
        $book->user_id = $request->user_id;
        $book->category_id = $request->sub_category;
        $book->description = $request->description;
        $book->made_year = $request->made_year;
        $book->save();
        return redirect()->route("admin.books.index");
    }



    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {

    }
}
