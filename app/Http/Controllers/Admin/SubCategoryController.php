<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{

    protected function rules(){
        return [
            "name" => ["required","max:255"],

        ];
    }

    protected function columns(){
        return [
            "name" => "english category name",
        ];
    }


    public function index(Request $request)
    {
        $data = $this->getSubCategories($request);
        return view("admin.sub_category.index", $data);
    }


    public function create(Request $request)
    {
        $data = $this->checkCategoryLimitation($request);
        $data["urlParams"] = $this->getUrlParams($data["mainCategory"],  null);
        return view("admin.sub_category.create", $data);
    }


    public function store(Request $request)
    {
        $data = $this->checkCategoryLimitation($request);
        $urlParams = $this->getUrlParams($data["mainCategory"],  null);


        $valid = Validator::make($request->all(), $this->rules(), [], $this->columns());
        if($valid->fails()){
            return redirect()->route("admin.sub_category.create", $urlParams)->withInput($request->all())->withErrors($valid->errors()->messages());
        }
        $category = new SubCategory();
        $category->name = $request->name;
        $category->level = 1;
        $category->main_id = $data["mainCategory"]->id;
        $category->save();

        if($data["mainCategory"]->limit_levels_of_sub_categories == $category->level && !$data["mainCategory"]->status){
//            $data["mainCategory"]->status = 1;
            $data["mainCategory"]->save();
        }

        return redirect()->route("admin.sub_category.index",$urlParams);
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

    public function checkCategoryLimitation(Request $request){
        $data["mainCategory"] = Category::findOrFail($request->main_id);
        if(!empty($request->get("parent_id"))){
            $data["subCategory"] = SubCategory::where([["id", $request->get("parent_id")],["main_id", $request->main_id]])->firstOrFail();
        }
        if(isset($data["subCategory"]) && $data["subCategory"]->level == $data["mainCategory"]->limit_levels_of_sub_categories)
            abort(404);
        return $data;
    }

    public function getUrlParams(Category $mainCategory, SubCategory $subCategory = null){
        $urlParams["main_id"] = $mainCategory->id;
        if(isset($subCategory) && $subCategory !== null && $subCategory instanceof SubCategory)
            $urlParams["parent_id"] = $subCategory->id;
        $data["urlParams"] = $urlParams;
        return $urlParams;
    }

    public function getSubCategories(Request $request){
        $data = $this->checkCategoryLimitation($request);
        if(!empty($request->get("parent_id")))
            $data["subCategories"] = $data["subCategory"]->childrens;
        else
            $data["subCategories"] = $data["mainCategory"]->SubCategoriesLevel1;

        $data["urlParams"] = $this->getUrlParams($data["mainCategory"], $data["subCategory"] ?? null);
        return $data;
    }

    public function destroy(Request $request)
    {
        SubCategory::find($request->id)->delete();
        return redirect()->route("admin.sub_category.index", $request->main_id);
    }
}
