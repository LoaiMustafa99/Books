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
        <div class="card">
            <div class="card-body">
                <div id="table" class="table-editable page-contant">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                        <tr>
                            <th>Total of income</th>
                            <th>Total of expenses</th>
                            <th>Wallet balance</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$total_of_income}}</td>
                                <td>{{$total_of_expenses}}</td>
                                <td>{{$wallet_balance}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

@endsection
