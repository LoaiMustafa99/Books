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
            <li class="breadcrumb-item"><a href="{{route("admin.category.index")}}">{{__("Main Categories")}}</a></li>
            <li class="breadcrumb-item"><a href="#">{{__("Create")}}</a></li>
        </ul>
    </div>
@endsection

@section("content")

    <div class="row">
        <div class="col-lg-10 m-auto">
            <div class="tile">
                <h3 class="tile-title">{{__("Create New Main Category")}}</h3>
                <div class="tile-body">
                    <form method="post" action="{{route("admin.category.store")}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Category Name")}}</label>
                                    <input class="form-control @if($errors->has('name')) is-invalid @endif" type="text" name="name" placeholder="{{__("Enter Main Category Name")}}">
                                </div>
                                @error("name")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="control-label">{{__("Levels Of Sub Categories")}}</label>
                                    <input class="form-control @if($errors->has('levels_of_sub_categories')) is-invalid @endif" type="number" name="levels_of_sub_categories" placeholder={{__("Enter Levels Of Sub Categories")}} value="{{inputValue("levels_of_sub_categories")}}">
                                </div>
                                @error("levels_of_sub_categories")
                                <div class="input-error">{{$message}}</div>
                                @enderror
                            </div>
                        </div>

{{--                        <hr>--}}

{{--                        <div class="row">--}}
{{--                            <div class="col-lg-6">--}}
{{--                                <div class="form-group">--}}
{{--                                    <label class="control-label">{{__("Main Category Photo")}}</label>--}}
{{--                                    <div>--}}
{{--                                        <button class="btn btn-primary form-control button-upload-file" >--}}
{{--                                            <input class="input-file show-uploaded" data-upload-type="single" data-imgs-container-class="uploaded-images" type="file" name="main_category_photo">--}}
{{--                                            <span class="upload-file-content">--}}
{{--                                                <i class="fas fa-upload fa-lg upload-file-content-icon left"></i>--}}
{{--                                                <span class="upload-file-content-text">{{__("Upload Photo")}}</span>--}}
{{--                                            </span>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                @error("main_category_photo")--}}
{{--                                <div class="input-error">{{$message}}</div>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                            <div class="col-lg-3 col-md-5 col-sm-6">--}}
{{--                                <div class="uploaded-images"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> {{__("Create")}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section("scripts")


@endsection
