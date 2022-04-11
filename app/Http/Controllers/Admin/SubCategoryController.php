<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $data['main'] = Category::find($request->main_id);
        $data['categories'] = SubCategory::where("main_id", $request->main_id)->get();
        return view("admin.sub_category.index", $data);
    }


    public function create(Request $request)
    {
        $data['main'] = Category::find($request->main_id);
        return view("admin.sub_category.create", $data);
    }


    public function store(Request $request)
    {
        $category = new SubCategory();
        $category->name = $request->name;
        $category->main_id = $request->main_id;
        $category->save();
        return redirect()->route("admin.sub_category.index", $request->main_id);
    }


    public function edit(Request $request)
    {
        $data['category'] = SubCategory::find($request->id);
        $data['main'] = Category::find($request->main_id);
        return view("admin.sub_category.edit", $data);
    }


    public function update(Request $request)
    {
        $category = SubCategory::find($request->id);
        $category->name = $request->name;
        $category->main_id = $request->main_id;
        $category->save();
        return redirect()->route("admin.sub_category.index", $request->main_id);
    }


    public function destroy(Request $request)
    {
        SubCategory::find($request->id)->delete();
        return redirect()->route("admin.sub_category.index", $request->main_id);
    }
}
