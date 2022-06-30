<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ReferralLink;
use App\Models\RegisterReferralLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class ReferralLinkController extends Controller
{
    public function index(){
        $data['links'] = ReferralLink::where("user_id", Auth::guard("reader")->user()->id)->get();
        return view("user.referral_link.index", $data);
    }

    public function store(Request $request){
        $link =  new ReferralLink();
        $link->user_id = Auth::guard("reader")->user()->id;
        $link->number_of_visitors = 0;
        $link->number_of_registered = 0;
        if($link->save()){
            $link->link = $this->generateLink($link->id);
            $link->save();
        }
        return redirect()->route("reader.referral_link.index");
    }

    public function generateLink($linkId){
        return URL::signedRoute('register.user', ["link_id"=> $linkId], now()->addMinutes(60));
    }

    public function RegisterByLink(Request $request){
        $data["users"] = RegisterReferralLink::where("referral_link_id", $request->id)->get();
        return view("user.referral_link.register_by_link", $data);
    }

    public function destroy(Request $request){
        ReferralLink::find($request->id)->delete();
        return redirect()->route("reader.referral_link.index");
    }
}
