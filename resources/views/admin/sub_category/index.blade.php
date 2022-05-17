@extends("layouts.admin.app")
@section("page-title")
    {{__("Dashboard")}}
@endSection
@section("css-links")
    <link rel="stylesheet" href="{{asset("assets/css/" . app()->getLocale() . "/pages/sub_categories.css")}}">
@endsection
@section("page-nav-title")
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>{{__("Sub Categories")}}</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">{{__("Dashboard")}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{__("Sub Categories")}}</a></li>
        </ul>
    </div>
@endsection

@section("content")
    <div class="row mb-4">
        <div class="col-lg-12">

            <a href="{{route("admin.sub_category.create",$urlParams)}}" class="btn btn-primary">{{__("Create New Sub Categroy")}}</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card categories-box">
                <div class="card-header">
                    <a href="{{route("admin.sub_category.index",["main_id" => $mainCategory->id])}}">{{$mainCategory->name}}</a> @if(isset($subCategory)) @include("admin.sub_category.parnets", ["sub" => $subCategory]) @endif
                </div>
                <div class="card-body">
                    @if($subCategories !== Null)
                        @foreach($subCategories as $sub)
                            <div class="card-text category-box">
                                <a href="{{(isset($subCategory) && $sub->level < $mainCategory->limit_levels_of_sub_categories) || (!isset($subCategory) &&  $mainCategory->limit_levels_of_sub_categories > 1)? route("admin.sub_categories.index", ["main_id" => $mainCategory->id, "parent_id" => $sub->id]) : "#"}}" class="box-link">
                                    {{$sub->name}}
                                </a>
                                <div class="category-link">
                                    @php $actionParams = $urlParams; $actionParams["id"] =  $sub->id; @endphp
                                    <a href="{{route("admin.sub_category.edit", $actionParams)}}" class="btn btn-success">{{__("Edit")}}</a>
                                    <form action="{{route("admin.sub_category.destroy", $actionParams)}}" method="post" id="delete{{$sub->id}}" style="display: none" data-swal-title="Delete Category" data-swal-text="{{__('Are Your Sure To Delete This Category ?')}}" data-yes="{{__('Yes')}}" data-no="{{__('No')}}" data-success-msg="{{__('the category has been deleted successfully')}}">@csrf @method("delete")</form>
                                    <span href="#" class="btn btn-danger control-link form-confirm" style="font-size: 14px" data-form-id="#delete{{$sub->id}}">Delete</span>
                                </div>
                            </div>
                        @endforeach
                    @endif
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
