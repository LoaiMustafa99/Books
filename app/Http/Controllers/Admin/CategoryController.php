<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $data['categories'] = Category::all();
        return view("admin.category.index", $data);
    }


    public function create()
    {
        return view("admin.category.create");
    }


    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route("admin.category.index");
    }


    public function edit(Request $request)
    {
        $data['category'] = Category::find($request->id);
        return view("admin.category.edit", $data);
    }


    public function update(Request $request, $id)
    {
        $category = Category::find($request->id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route("admin.category.index");
    }


    public function destroy(Request $request)
    {
        Category::find($request->id)->delete();
        return redirect()->route("admin.category.index");
    }
}
