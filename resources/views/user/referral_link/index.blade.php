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
        <div class="button-add">
            <form action="{{route("reader.referral_link.store")}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success mb-3">Add Referral Link</button>
            </form>
        </div>
        <div class="card">
            <div class="card-body">
                <div id="table" class="table-editable page-contant">
                    <table class="table table-bordered table-responsive-md table-striped text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>link</th>
                            <th>number of visitors</th>
                            <th>number of registered user</th>
                            <th>show register user</th>
                            <th>delete</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($links as $link)
                                <tr>
                                    <td>{{$link->id}}</td>
                                    <td>{{$link->link}}</td>
                                    <td>{{$link->number_of_visitors}}</td>
                                    <td>{{$link->number_of_registered}}</td>
                                    <td><a href="{{route("reader.referral_link.register-by-link", $link->id)}}" class="btn btn-primary">show</a></td>
                                    <td>
                                        <form  id="delete-form" action="{{route("reader.referral_link.destroy", $link->id)}}" method="POST">
                                            @csrf
                                            @method("delete")
                                            <button class="btn btn-danger" type="submit">Delete</button>
                                        </form>
                                    </td>
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
