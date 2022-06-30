@extends("layouts.admin.app")
@section("page-title")
    {{__("Users")}}
@endSection
@section("page-nav-title")
    <div class="header-page">
        <div>
            Admin / User Wallets
        </div>
    </div>
@endsection

@section("content")

    <div class="wrapper">
        <div class="card">
            <div class="card-body">
                <div id="table" class="table-editable page-contant">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Total of income</th>
                            <th>Total of expenses</th>
                            <th>Wallet balance</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($wallets as $name => $wallet)
                                <tr>
                                    <td>{{$name}}</td>
                                    <td>{{$wallet['total_of_income']}}</td>
                                    <td>{{$wallet['total_of_expenses']}}</td>
                                    <td>{{$wallet['wallet_balance']}}</td>
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
