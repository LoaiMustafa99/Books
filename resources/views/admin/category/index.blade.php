@extends("layouts.admin.app")
@section("page-title")
    {{__("Dashboard")}}
@endSection
@section("page-nav-title")
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>{{__("Main Categories")}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{__("Main Categories")}}</a></li>
        </ul>
    </div>
@endsection

@section("content")
    <div class="row mb-4">
        <div class="col-lg-12">

            <a href="{{route("admin.category.create")}}" class="btn btn-primary">{{__("Create New Category")}}</a>
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
                                <th>{{__("Name")}}</th>
                                <th>{{__("Levels Of Sub Categories")}}</th>
                                <th>{{__("Activation")}}</th>
                                <th>{{__("Sub Category")}}</th>
                                <th>{{__("Control")}}</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->limit_levels_of_sub_categories}}</td>
                                        <td class="text-center"> <span class="status-box @if($category->status) bg-active-color @else bg-non-active-color @endif">
                                            {{$category->status ? __("Active") : __("Non-Active")}}
                                        </span>
                                        </td>
                                        <td>
                                            <a href="{{route("admin.sub_category.index", $category->id)}}" class="btn btn-primary">{{__("View")}}</a>
                                        </td>
                                        <td>
                                            <a href="{{route("admin.category.edit", $category->id)}}" class="control-link edit"><i class="fas fa-edit"></i></a>
                                            <form action="{{route("admin.category.destroy", $category->id)}}" method="post" id="delete{{$category->id}}" style="display: none" data-swal-title="{{__("Delete Category")}}" data-swal-text="{{__("Are You Sure To Delete This Category?")}}" data-yes="{{__("Yes")}}"" data-no="{{__("No")}}"" data-success-msg="{{__("the category has been deleted succssfully")}}">@csrf @method("delete")</form>
                                            <span href="#" class="control-link remove form-confirm" data-form-id="#delete{{$category->id}}"><i class="far fa-trash-alt"></i></span>
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
