@extends("layouts.user.app")
@section("page-title")
    {{__("Users")}}
@endSection
@section("page-nav-title")
    <div class="header-page">
        <div>
            User / Referral Link
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
                            <th>Email</th>
                            <th>Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $userByLink)
                            <tr>
                                <td>{{$userByLink->user->name}}</td>
                                <td>{{$userByLink->user->email}}</td>
                                <td>{{$userByLink->user->phone_number}}</td>
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
