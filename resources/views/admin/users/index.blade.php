@extends("layouts.admin.app")
@section("page-title")
    {{__("Dashboard")}}
@endSection
@section("page-nav-title")
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>{{__("Users")}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{__("Users")}}</a></li>
        </ul>
    </div>
@endsection

@section("content")
    <div class="row mb-4">
        <div class="col-lg-12">

            <a href="{{route("admin.user.create")}}" class="btn btn-primary">{{__("Create New User")}}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center" id="sampleTable">
                            <thead>
                            <tr>
                                <th>{{__("ID")}}</th>
                                <th>{{__("Full Name")}}</th>
                                <th>{{__("Image")}}</th>
                                <th>{{__("Email")}}</th>
                                <th>{{__("Birth Date")}}</th>
                                <th>{{__("Created At")}}</th>
                                <th>{{__("Control")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->full_name}}</td>
                                    <td><img src="{{$user->getFirstMediaFile("profile_photo") ? $user->getFirstMediaFile("profile_photo")->url : $user->defaultUserPhoto()}}" width="80"></td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->birth_date}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a href="{{route("admin.user.edit", $user->id)}}" class="control-link edit"><i class="fas fa-edit"></i></a>
                                        <form action="{{route("admin.user.destroy", $user->id)}}" method="post" id="delete{{$user->id}}" style="display: none" data-swal-title="{{__("Delete User")}}" data-swal-text="{{__("Are You Sure To Delete This User?")}}" data-yes="{{__("Yes")}}"" data-no="{{__("No")}}"" data-success-msg="{{__("the User has been deleted succssfully")}}">@csrf @method("delete")</form>
                                        <span href="#" class="control-link remove form-confirm" data-form-id="#delete{{$user->id}}"><i class="far fa-trash-alt"></i></span>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("scripts")

    <!-- Data table plugin-->
    <script type="text/javascript" src="{{asset("assets/js/plugins/jquery.dataTables.min.js")}}"></script>
    <script type="text/javascript" src="{{asset("assets/js/plugins/dataTables.bootstrap.min.js")}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

@endsection
