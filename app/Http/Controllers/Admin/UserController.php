<?php

namespace  App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function index()
    {
        $data['users']= User::all();
        return view("admin.users.index",$data);
    }

    public function create()
    {
        return view("admin.users.create");
    }

    public function store(Request $request)
    {
        $user=new User();
        $user->full_name=$request->full_name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->age=$request->age;
        $user->description=$request->description;
        $user->birth_date=$request->birth_date;
        $user->save();
        return redirect()->route("admin.user.index");
    }


    public function edit(Request $request)
    {

        $data['user']=user::find($request->id);
        return view("admin.users.edit",$data);
    }

    public function update(Request $request, $id)
    {
        $user=user::find($request->id);
        $user->full_name=$request->full_name;
        $user->username=$request->username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->age=$request->age;
        $user->description=$request->description;
        $user->birth_date=$request->birth_date;

        $user->save();
        return redirect()->route("admin.user.index");
    }

    public function destroy(Request $request)
    {
        user::find ($request->id)->delete();
        return redirect()->route("admin.user.index");

    }
}
