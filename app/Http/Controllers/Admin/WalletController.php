<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    public function index(){
        $data = [];
        $users = User::all();

        foreach ($users as $user) {
            $wallets = Transaction::where("user_id", $user->id)->get();

            $wallets_user_in_out = 0;
            $total_of_income = 0;
            $total_of_expenses = 0;
            if($wallets->isNotEmpty()){
                foreach ($wallets as $wallet) {
                    $wallets_user_in_out += ($wallet->amount) * ($wallet->in_out);
                    if($wallet->in_out == 1){
                        $total_of_income += $wallet->amount;
                    }else{
                        $total_of_expenses += $wallet->amount;
                    }
                }
            }

            $data["wallets"][$user->name]['wallet_balance'] = $wallets_user_in_out;
            $data["wallets"][$user->name]['total_of_income'] = $total_of_income;
            $data["wallets"][$user->name]['total_of_expenses'] = $total_of_expenses;
        }
        return view("admin.wallets.index", $data);
    }
}
