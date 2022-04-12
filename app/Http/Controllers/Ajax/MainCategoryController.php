<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function index(Request $request){
        try {
            $subCategories = SubCategory::where("main_id", $request->main_id)->get();
            if($subCategories->isEmpty())
                return JsonResponse::success()->changeStatusNumber("S404")->send();
            return JsonResponse::data($subCategories)->send();
        }catch (\Exception $e){
            return JsonResponse::error()->message($e->getMessage())->send();
        }
    }
}
