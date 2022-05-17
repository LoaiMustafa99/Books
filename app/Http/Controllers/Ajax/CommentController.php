<?php

namespace App\Http\Controllers\Ajax;

use App\Helpers\ApiResponse\Json\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function save(Request $request){
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user_id = Auth::guard("reader")->user()->id;
        $comment->post_id = $request->post_id;
        $comment->save();
        return JsonResponse::data(["name" => Auth::guard("reader")->user()->full_name, "image" => Auth::guard("reader")->user()->getFirstMediaFile("profile_photo") ?  Auth::guard("reader")->user()->getFirstMediaFile("profile_photo")->url :  Auth::guard("reader")->user()->defaultUserPhoto()])->send();
    }
}
