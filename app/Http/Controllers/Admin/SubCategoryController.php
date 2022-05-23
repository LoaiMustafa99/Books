<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use App\Repositories\SubCategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    protected $repository;
    public function __construct(SubCategoryRepository $repo){
        $this->repository = $repo;
    }
    protected function rules(){
        return [
            "name" => ["required","max:255"],
        ];
    }

    protected function columns(){
        return [
            "name" => "category name",
        ];
    }



    public function index(Request $request){
//        dd($request->main_id);
        $data = $this->repository->getSubCategories($request);
        return view("admin.sub_category.index", $data);
    }

    public function create(Request $request){
        $data = $this->repository->checkCategoryLimitation($request);
        $data["urlParams"] = $this->repository->getUrlParams($data["mainCategory"], $data["subCategory"] ?? null);
        return view("admin.sub_category.create", $data);
    }

    public function store(Request $request){
        $data = $this->repository->checkCategoryLimitation($request);
        $urlParams = $this->repository->getUrlParams($data["mainCategory"], $data["subCategory"] ?? null);


        $valid = Validator::make($request->all(), $this->rules(), [], $this->columns());
        if($valid->fails()){
            return redirect()->route("admin.sub_category.create", $urlParams)->withInput($request->all())->withErrors($valid->errors()->messages());
        }
        $category = new SubCategory();
        $category->name = $request->name;
        $category->level = isset($data["subCategory"]) ? $data["subCategory"]->level + 1 : 1;
        $category->main_id = $data["mainCategory"]->id;
        $category->parent_id = isset($data["subCategory"]) ? $data["subCategory"]->id  : null;
        $category->save();

        if($data["mainCategory"]->limit_levels_of_sub_categories == $category->level && !$data["mainCategory"]->status){
            $data["mainCategory"]->status = 1;
            $data["mainCategory"]->save();
        }
        return redirect()->route("admin.sub_category.index",$urlParams);
    }

    public function edit(Request $request){
        $result = $this->repository->checkCategoryLimitation($request);
        $data["urlParams"] = $this->repository->getUrlParams($result["mainCategory"], $result["subCategory"] ?? null);
        $data["category"] = SubCategory::findOrFail($request->id);
        return view("admin.sub_category.edit", $data);
    }

    public function update(Request $request){
        $data = $this->repository->checkCategoryLimitation($request);
        $urlParams = $this->repository->getUrlParams($data["mainCategory"], $data["subCategory"] ?? null);
        $category = SubCategory::findOrFail($request->id);
        $rules = $this->rules();
        if(!$request->hasFile("sub_category_photo"))
            $rules["sub_category_photo"] = [];

        $valid = Validator::make($request->all(), $rules, [], $this->columns());
        if($valid->fails()){
            return redirect()->route("admin.sub_category.edit", $urlParams + ["id" => $category->id])->withInput($request->all())->withErrors($valid->errors()->messages());
        }

        $category->name = $request->name;
        $category->save();


        return redirect()->route("admin.sub_category.index",$urlParams);

    }

    public function destroy(Request $request){
        $data = $this->repository->checkCategoryLimitation($request);
        $urlParams = $this->repository->getUrlParams($data["mainCategory"], $data["subCategory"] ?? null);
        $subCategory = SubCategory::findOrFail($request->id);
        $mainCategory = $data["mainCategory"];
        $numberCategoriesInSameLevel = SubCategory::where([["main_id" ,$mainCategory->id],["level",$subCategory->level]])->count();
        if($numberCategoriesInSameLevel <= 1){
            $mainCategory->status = false;
            $mainCategory->save();
        }
        $this->repository->removeSubCategory($subCategory);
        return redirect()->route("admin.sub_category.index",$urlParams);
    }
}
