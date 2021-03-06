@extends("layouts.admin.app")
@section("page-title")
    {{__("Users")}}
@endSection
@section("page-nav-title")
    <div class="header-page">
        <div>
            Admin / Users
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
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Created At</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($users))
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">
                                    There are No Users
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("scripts")

@endsection
