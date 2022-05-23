<?php


namespace App\Repositories;


use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryRepository
{



    public function checkCategoryLimitation(Request $request){
        $data["mainCategory"] = Category::findOrFail($request->main_id);
//        dd($request->get("parent_id"));
        if(!empty($request->get("parent_id"))){
            $data["subCategory"] = \App\Models\SubCategory::where([["id", $request->get("parent_id")],["main_id", $request->main_id]])->firstOrFail();
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

    public function removeSubCategory($subCategory){
        if($subCategory->childrens->isNotEmpty()){
            foreach ($subCategory->childrens as $sub)
                $this->removeSubCategory($sub);
        }
        $subCategory->delete();
        return true;
    }



}
