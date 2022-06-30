<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\ReferralLink;
use App\Models\RegisterReferralLink;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use App\Rules\BeforeTime;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:reader');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function showRegisterForm(Request $request)
    {
        if(isset($request->link_id)){
            $link_id = $request->link_id;
            $this->addVisitorByLink($link_id);
        }
        return view('auth.register');
    }

    public function addVisitorByLink($link_id){
        $add = ReferralLink::find($link_id);
        $add->number_of_visitors=$add->number_of_visitors+1;
        $add->save();
    }

    public function rules(){
        $rules = [
            "name" => ["required"],
            "email" => ['required', "email", "unique:users"],
            "password" => ['required',"min:8", "max:30"],
            "confirm_password" => ["required", "same:password"],
            "phone_number"     => ['required', "unique:users"],
//            "user_image"       => ["required", "max:50240"]
        ];

        return $rules;
    }

    public function createUser(Request $request){
        $valid = Validator::make($request->all(), $this->rules());
        if($valid->fails())
            return redirect()->back()->withInput($request->all())->withErrors($valid->errors()->messages());

        $user = new User();
        $user->name = $request->name;
        $user->phone_number = $request->phone_number;
        $user->email = $request->email;
        $user->birth_date = $request->birth_date;
        $user->password = Hash::make($request->password);
        $user->user_image = "sasd";
        $user->save();

        if(isset($request->link_id)){
            $this->addUserByLink($request->link_id, $user->id);
        }

        return redirect()->route("user.login");
    }

    public function addUserByLink($linkId, $userId){
        $register = new RegisterReferralLink();
        $register->referral_link_id = $linkId;
        $register->user_id = $userId;
        if($register->save()) {
            $link = ReferralLink::find($linkId);
            $link->number_of_registered=$link->number_of_registered+1;
            $link->save();
        }
    }

}
