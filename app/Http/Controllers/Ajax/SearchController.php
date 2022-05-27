<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request){
        $books = Book::where("name", "like", "%" . $request->text . "%")->get();
        $data = [];
        foreach ($books as $index => $book){
            $data["books"][$index]['name'] = $book->name;
            $data["books"][$index]['description'] = $book->description;
            $data["books"][$index]['image'] = $book->getFirstMediaFile()->url;
            $data["books"][$index]['id'] = $book->id;
        }
        return JsonResponse::data($data)->send();
    }
}
