<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function getSubCategory(Request $request){
        $data = [];
        $data['categories'] = $sub = SubCategory::where([["main_id", $request->id], ["level", 1]])->get();
        $books = Book::join("sub_categories", "sub_categories.id", "=", "book.category_id")->join("category", "category.id", "=", "sub_categories.main_id")
            ->where("category.id", $request->id)->where("book.approved", 1)->get("book.*");
        foreach ($books as $index => $book){
            $data["books"][$index]['name'] = $book->name;
            $data["books"][$index]['description'] = $book->description;
            $data["books"][$index]['image'] = $book->getFirstMediaFile()->url;
            $data["books"][$index]['id'] = $book->id;
        }
        return JsonResponse::data($data)->send();
    }

    public function getSubCategoryBySub(Request $request){
        $data['categories'] = $sub = SubCategory::where("parent_id", $request->id)->get();
        $books = Book::join("sub_categories", "sub_categories.id", "=", "book.category_id")->where("book.approved", 1)->where(function ($q) use ($request){
            $q->where("sub_categories.id", $request->id)->orWhere("parent_id", $request->id);
        })->get("book.*");
        foreach ($books as $index => $book){
            $data["books"][$index]['name'] = $book->name;
            $data["books"][$index]['description'] = $book->description;
            $data["books"][$index]['image'] = $book->getFirstMediaFile()->url;
            $data["books"][$index]['id'] = $book->id;
        }
        return JsonResponse::data($data)->send();
    }
}
