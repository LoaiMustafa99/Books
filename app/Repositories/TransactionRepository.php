<?php


namespace App\Repositories;


use App\Models\Transaction;
use App\Models\TransactionType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionRepository
{
    public function rules(Request $request){
        $rules = [
            "amount"  => ["required"],
            "in_out"  => ["required", "in:1,-1"],
            "note"    => ["max:255"]
        ];

        if($request->status == 1){
            $rules['category'] = ["required"];
        }else{
            $rules['category_id']  = ["required"];
        }

        return $rules;
    }

    public function save(Request $request){

        if($request->status == 1) {
            $transactionType = new TransactionType();
            $transactionType->name = $request->category;
            $transactionType->type = $request->in_out == 1 ? "Expenses" : "Income";
            $transactionType->user_id = Auth::guard("reader")->user()->id;
            $transactionType->save();
            $transactionTypeId = $transactionType->id;
        }else{
            $transactionTypeId = $request->category_id;
        }

        $transaction = new Transaction();
        $transaction->type_id = $transactionTypeId;
        $transaction->amount = $request->amount;
        $transaction->note = $request->note;
        $transaction->in_out = $request->in_out;
        $transaction->user_id = Auth::guard("reader")->user()->id;
        $transaction->save();
    }

    public function show(){
        $data = [];
        $wallets = Transaction::where("user_id", Auth::guard("reader")->user()->id)->get();

        $wallets_user_in_out=0;
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

        $data['wallet_balance'] = $wallets_user_in_out;
        $data['total_of_income'] = $total_of_income;
        $data['total_of_expenses'] = $total_of_expenses;
        return $data;
    }
}
