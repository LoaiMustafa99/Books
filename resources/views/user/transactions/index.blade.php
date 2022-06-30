@extends("layouts.user.app")
@section("page-title")
    {{__("Users")}}
@endSection
@section("page-nav-title")
    <div class="header-page">
        <div>
            User / Transaction Wallets
        </div>
    </div>
@endsection

@section("content")

    <div class="wrapper">
        <a href="{{route("reader.wallet.create")}}" class="btn btn-success mb-3">Add Transaction</a>
        <div class="card">
            <div class="card-body">
                <div id="table" class="table-editable page-contant">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>category</th>
                            <th>type</th>
                            <th>Amount</th>
                            <th>note</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->id}}</td>
                                <td>{{$transaction->category->name}}</td>
                                <td>{{$transaction->in_out == -1 ? "Expenses" : "Income"}}</td>
                                <td>{{$transaction->amount}}</td>
                                <td>{{$transaction->note}}</td>
                                <td>{{$transaction->created_at}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

@endsection
