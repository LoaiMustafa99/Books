<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Dialog\Web\Dialog;
use App\Helpers\Dialog\Web\Types\SuccessMessage;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Rules\HashMatching;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Testing\Fluent\Concerns\Has;

class ProfileController extends Controller
{
    public function rules(){
        return [
            "full_name" => ["required", "max:255"],
            "email" => ["email", "unique:admins", "required"],
            "username" => ["required","unique:admins"]
        ];
    }

    public function rulesPassword(){
        return [
            "old_password" =>  ["required", new HashMatching(Auth::user()->password)],
            "password" =>  ["required"],
            "confirm_password" =>  ["required", "same:password"]
        ];
    }

    public function index(){
        $data['admin'] = Admin::find(Auth::user()->id);
        return view("admin.profile.index", $data);
    }

    public function update(Request $request){
        $valid = Validator::make($request->all(), $this->rules());
        if($valid->fails())
            return redirect()->route("admin.profile.index")->withInput($request->all())->withErrors($valid->errors()->messages());
        $admin = Admin::find(Auth::user()->id);
        $admin->username = $request->username;
        $admin->full_name = $request->full_name;
        $admin->email = $request->email;
        $admin->save();
        $message = (new SuccessMessage())->title("Update Successfully")
            ->body("The Profile information Has Been Update Successfully");
        Dialog::flashing($message);
        return redirect()->route("admin.profile.index");
    }

    public function ChangePassword(Request $request){
        $valid= Validator::make($request->all(), $this->rulesPassword());
        if($valid->fails())
            return redirect()->route("admin.profile.index")->withInput($request->all())->withErrors($valid->errors()->messages());
        $admin = Admin::find(Auth::user()->id);
        $admin->password = Hash::make($request->password);
        $message = (new SuccessMessage())->title("Update Successfully")
            ->body("The Profile information Has Been Update Successfully");
        Dialog::flashing($message);
        $admin->save();
        return redirect()->route("admin.profile.index");
    }
}
