<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function getByMainCategory(Request $request){
        try {
           $subCategories = SubCategory::where([["main_id", $request->main_id], ["level", 1]])->get();
            if($subCategories->isEmpty())
                return JsonResponse::success()->changeStatusNumber("S404")->send();
            return JsonResponse::data($subCategories)->send();
        }catch (\Exception $e){
            return JsonResponse::error()->message($e->getMessage())->send();
        }
    }

    public function getBySubCategory(Request $request){
        try {
            $subCategory = SubCategory::find($request->category_id);

            if(!$subCategory|| $subCategory->childrens->isEmpty())
                return JsonResponse::success()->changeStatusNumber("S404")->send();
            $data["subCategories"] = $subCategory->childrens()->get();
            $data["isLastLevel"] = ($subCategory->level + 1) == $subCategory->main->limit_levels_of_sub_categories;
            return JsonResponse::data($data)->send();
        }catch (\Exception $e){
            return JsonResponse::error()->message($e->getMessage())->send();
        }
    }
}
