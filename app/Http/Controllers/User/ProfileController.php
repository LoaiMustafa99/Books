<?php

namespace App\Http\Controllers\User;

use App\Helpers\Dialog\Web\Dialog;
use App\Helpers\Dialog\Web\Types\SuccessMessage;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\BeforeTime;
use App\Rules\HashMatching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function rules(Request $request){
        $rules = [
            "username" => ["required"],
            "full_name" => ["required"],
            "birth_date" => ["required"]
        ];

        if($request->password){
            $rules['old_password'] = ['required', new HashMatching(Auth::guard("reader")->user()->password)];
            $rules['password'] = ['required'];
            $rules['confirm_password'] = ["required", "same:password"];
        }
        $yearBefore = (int)date("Y", time()) - 15;
        $monthBefore = date("m", time());
        $dayBefore = date("d", time());
        $rules["birth_date"] = ["date", new BeforeTime("{$yearBefore}-{$monthBefore}-$dayBefore")];
        return $rules;
    }

    public function index(){
        $data['user'] = User::find(Auth::guard("reader")->user()->id);
        return view("user.profile.index", $data);
    }

    public function update(Request $request){
        $rules = $this->rules($request);
        $valid = Validator::make($request->all(), $rules);
        if ($valid->fails())
            return redirect()->route("reader.profile.index")->withInput($request->all())->withErrors($valid->errors()->messages());

        $user = User::find($request->id);
        $user->username = $request->username;
        $user->full_name = $request->full_name;
        $user->birth_date = $request->birth_date;

        if($request->password){
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if ($request->hasFile("image")){
            $user->removeAllFiles();
            $user->saveMedia($request->file("image"), "profile_photo");
        }
        $message = (new SuccessMessage())->title("Update Successfully")
            ->body("The Profile information Has Been Update Successfully");
        Dialog::flashing($message);
        return redirect()->route("reader.profile.index");
    }
}
