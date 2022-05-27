<?php

namespace App\Http\Controllers\User;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\BookFavorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookFavoriteController extends Controller
{
    public function store(Request $request){

//        var_dump($request->book_id);die;
        $favorite = new BookFavorite();
        $favorite->user_id = Auth::guard("reader")->user()->id;
        $favorite->book_id = $request->book_id;
        $favorite->save();
        return JsonResponse::success()->send();
    }
}
