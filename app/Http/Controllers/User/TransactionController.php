<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\TransactionType;
use App\Repositories\TransactionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TransactionController extends Controller
{
    protected TransactionRepository $repository;

    public function __construct(TransactionRepository $repository)
    {
        $this->repository = $repository;
    }


    public function index(){
        $data['transactions'] = Transaction::where("user_id", Auth::guard("reader")->user()->id)->get();
        return view("user.transactions.index", $data);
    }

    public function create(){
        $data['categories'] = TransactionType::all();
        return view("user.transactions.create", $data);
    }

    public function store(Request $request){

        try {
            $valid = Validator::make($request->all(), $this->repository->rules($request));
            if ($valid->fails())
                return redirect()->route("reader.wallet.create")->withInput($request->all())->withErrors($valid->errors()->messages());

            DB::connection()->beginTransaction();
                $this->repository->save($request);
            DB::connection()->commit();
            return redirect()->route("reader.wallet.index");
        }catch (\Exception $e){
            DB::connection()->rollBack();
            return $e->getMessage();
        }
    }

    public function showWallet(Request $request){
        $data = $this->repository->show();
        return view("user.transactions.wallet", $data);
    }
}
